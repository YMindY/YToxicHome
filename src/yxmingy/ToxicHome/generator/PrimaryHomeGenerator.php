<?php
namespace yxmingy\ToxicHome\generator;
use pocketmine\block\Block;
use pocketmine\level\format\Chunk;
use pocketmine\math\Vector3;
class PrimaryHomeGenerator extends VoidGenerator
{
  public function __construct(array $settings = []){
    parent::__construct($settings);
    $this->generateEmptyChunk();
  }
  public function generateEmptyChunk() : void{
		$chunk = new Chunk(0, 0);
		$chunk->setGenerated();

		for($Z = 0; $Z < 16; ++$Z){
			for($X = 0; $X < 16; ++$X){
				$chunk->setBiomeId($X, $Z, 1);
				for($y = 0; $y < 256; ++$y){
					$chunk->setBlock($X, $y, $Z, Block::AIR, 0);
				}
			}
		}

		$this->emptyChunk = $chunk;
	}

	public function generateChunk(int $chunkX, int $chunkZ) : void{
  $chunk = $this->level->getChunk($chunkX, $chunkZ);
  if($chunkX != 0 || $chunkZ != 0) return;
  //$x = $chunkX << 4;
 // $z = $chunkZ << 4;
  for($fx=0;$fx<=3;$fx++)
  {
    for($fz=0;$fz<=3;$fz++)
    {
      $chunk->setBlock($fx,1,$fz,Block::GRASS);
    }
  }
		$chunk->setX($chunkX);
		$chunk->setZ($chunkZ);
		$chunk->setGenerated();
		$chunk->setPopulated();

		$this->level->setChunk($chunkX, $chunkZ, $chunk);
	}

	public function populateChunk(int $chunkX, int $chunkZ) : void{

	}
  public static function getWorldSpawn() : Vector3{
    return new Vector3(0, 2, 0);
  }
  public function getSpawn() : Vector3{
    return new Vector3(0, 2, 0);
  }
}