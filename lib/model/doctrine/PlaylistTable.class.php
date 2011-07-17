<?php

/**
 * PlaylistTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PlaylistTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object PlaylistTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Playlist');
  }
  
  /**
   * Add a playlist
   *
   * @param playlist_name     str: new playlist name
   * @param scan_id           int: the scan id for a service scanner
   * @param service_name      str: the name of the service this playlist comes from eg.itunes
   * @param service_unique_id str: any metadata key string to make the playlist more unique
   * @return                  int: insert row id
   */
  public function addPlaylist( $playlist_name, $scan_id=0, $service_name=null, $service_unique_id=null )
  {
    $playlist = new Playlist();
    if($scan_id > 0)
    {
      $playlist->scan_id = $scan_id;
    }
    if(strlen($service_name) > 0)
    {
      $playlist->service_name = $service_name;
    }
    if(strlen($service_unique_id) > 0)
    {
      $playlist->service_unique_id = $service_unique_id;
    }
    $playlist->name = $playlist_name;
    $playlist->mtime = time();
    $playlist->save();
    $id = $playlist->getId();
    $playlist->free();
    return $id;
  }
  
  /**
   * Delete a playlist
   * @param playlist_id int: playlist id
   * @return            int: number of rows affected
   */
  public function deletePlaylist( PlaylistFilesTable $playlist_files, $playlist_id )
  {
    //delete playlist entry
    $qp = Doctrine_Query::create()
      ->delete( 'Playlist p' )
      ->where( 'p.id = ?', $playlist_id )
      ->execute();
    $qpf = $playlist_files->deleteAllPlaylistFiles($playlist_id);
    return($qp+$qpf);
  }
    
  /**
   * Fetch the playlist list
   * @param alpha str: the alphabetical grouping
   * @return      array: of all genre entries
   */
  public function getList( $alpha = 'all' )
  {
    $q = Doctrine_Query::create()
      ->select( 'p.id, p.name' )
      ->from( 'Playlist p' );
    if( $alpha !== 'all' )
    {
      $q->where( 'upper( p.name ) LIKE ?', strtoupper( substr( $alpha, 0, 1 ) ) . '%' );
    }
    $q->orderBy( 'p.name ASC' );
    return $q->fetchArray();
  }
  
  /**
   * Try to mark a playlist as scanned by service,name and id
   *
   * @param service_name       str: the playlist service name (eg itunes)
   * @param playlist_name      str: the playlist name (eg New_Playlist)
   * @param service_unique_id  str: unique service value to update (service specific hash etc)
   * @param last_scan_id       int: scan id value to update
   * @return                   int: rows affected
   */
  public function updateScanId( $service_name, $playlist_name, $service_unique_id=null, $last_scan_id )
  {
    $id = 0;
    $q = $this->createQuery()
      ->where('name = ?', $playlist_name)
      ->andWhere('service_name = ?',$service_name);
    if(strlen($service_unique_id) > 0)
    {
      $q->andWhere('service_unique_id = ?',$service_unique_id);
    }
    $result = $q->fetchOne();
    if( is_object( $result ) )
    {
      $id = $result->id;
      $result->scan_id = $last_scan_id;
      $result->save();
      unset($q, $result);
    }
    else
    {
      unset($q);
    }
    return $id;
  }
  
  /**
   * Purge playlists and files from the database if they were not found in the last scan
   *
   * @param playlist_files obj: PlaylistFilesTable instance
   * @param last_scan_id   int: scan id value to validate
   * @param service_name   str: the name of the service to purge from
   * @return               int: rows affected
   */
  public function finalizeScan(PlaylistFilesTable $playlist_files, $last_scan_id, $service_name)
  {
    $count = 0;
    $q = $this->createQuery()
      ->where('scan_id != ?', $last_scan_id)
      ->andWhere('service_name = ?', $service_name);
    $result = $q->execute();
    if( is_object( $result ) )
    {
      foreach($result as $row)
      {
        $this->deletePlaylist( $playlist_files, $row->id );
        $count++;
      }
    }
    
    return $count;
  }
}