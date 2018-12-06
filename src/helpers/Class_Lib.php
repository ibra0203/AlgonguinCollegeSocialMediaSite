<?php
    include_once('util.php');
    include_once ("ConstantsAndSettings.php");
    
    if(!class_exists('Picture')){
    class Picture {
  private $fileName; 
  private $id;
  private $title;
  private $description;
  private $date;

  public static function getPictures() {
    $pictures = array();
    $files = scandir(ALBUM_THUMBNAILS_DIR); 
    usort($files, function($a, $b){
        if($a =='.' || $a =='..' || $b == '.' || $b =='..')
            return false;
        consoleLog((filectime(ALBUM_THUMBNAILS_DIR.'/'.$a) < filectime(ALBUM_THUMBNAILS_DIR.'/'.$b)));
        return (filectime(ALBUM_THUMBNAILS_DIR.'/'.$a) < filectime(ALBUM_THUMBNAILS_DIR.'/'.$b));
    });
    $numFiles = count($files);
    
    if ($numFiles > 2 ){
     for($i = 2; $i < $numFiles; $i++) {
       $ind = strrpos($files[$i], "/");
      
       $fileName = substr($files[$i], $ind);
       $picture = new Picture($fileName, $i); 
       $pictures["$i"] = $picture;
     }
    }
    return $pictures;
  }
  public function __construct($fileName, $id, $title, $description, $date)
  {
    $this->fileName = $fileName; 
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->date = $date;
  }
  public function getDate()
  {
      return $this->date;
  }
  public function getTitle()
  {
      return $this->title;
  }
  public function getDescription()
  {
      return $this->description;
  }
  public function getId() 
  {
    return $this->id;
  }
  public function getName(){
    $ind = strrpos($this->fileName, ".");
    $name = substr($this->fileName, 0, $ind); 
    return $name;
  }
  public function getFullFileName(){
      return $this->fileName;
  }
  public function getAibumFilePath(){
    return ALBUM_PICTURES_DIR."/".$this->fileName;
  }
  public function getThumbnailFilePath(){
    return ALBUM_THUMBNAILS_DIR."/".$this->fileName;
  }
  public function getOriginalFilePath(){
    return ORIGINAL_PICTURES_DIR."/".$this->fileName;
  }
}
    }
?>