<?php

class m160511_080759_addPicturesToApartments extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $sql = "
        ALTER TABLE `apartments` ADD `image` VARCHAR(250)
        ";
        $command = $this->dbConnection->createCommand($sql);
        $command->execute();

    }

	public function safeDown()
	{

	}
}