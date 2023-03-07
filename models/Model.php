<?php
include_once './models/Db.php';
include_once './models/User.php';

class Model
{
   public function getConn()
   {
      return Db::getInstance()->getConnection();
   }

   public function getMedia($id)
   {
      $sql = "SELECT * FROM medias, authors, genres, types, appartient_genre, appartient_author WHERE medias.mediaTypeId = types.typeID AND medias.mediaId = appartient_author.appartientMediaId  AND appartient_author.appartientAuthorId = authors.authorId AND medias.mediaId = appartient_genre.appartientMediaId AND genres.genreId = appartient_genre.appartientGenreId AND medias.mediaID = $id";
      $result = $this->getConn()->prepare($sql);
      $result->execute();
      $medias = $result->fetchAll(PDO::FETCH_ASSOC);

      $media = $this->getMediaFromResult($medias);

      $media = new Media($media['mediaId'], $media['mediaName'], $media['mediaYear'], $media['mediaDescription'], $media['mediaCoverImage'], $media['mediaBackgroundImage'],   $media['mediaPublishingDate'], $media['authors'], $media['genres'], $media['typeName']);
      return $media;
   }
}
