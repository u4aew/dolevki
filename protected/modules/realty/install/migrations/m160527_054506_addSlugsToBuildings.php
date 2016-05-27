<?php

class m160527_054506_addSlugsToBuildings extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $sql = "
        ALTER TABLE `buildings` ADD `slug` VARCHAR(250)
        ";
        $command = $this->dbConnection->createCommand($sql);
        $command->execute();
	}

	public function safeDown()
	{

	}
}