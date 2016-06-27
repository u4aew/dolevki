<?php

class m160627_085558_addImageToBuilders extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $sql = "
        ALTER TABLE `builders` ADD `image` VARCHAR(250)
        ";
        $command = $this->dbConnection->createCommand($sql);
        $command->execute();
	}

	public function safeDown()
	{

	}
}