<?php

class m161024_073838_add_pages extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $this->createTable("realtyPages", [
                'id' => 'pk',
                'seo_title' => 'string',
                'seo_description' => 'text',
                'seo_keywords' => 'text',
                'h1' => 'string',
                'type' => 'int',
                'upper_text' => 'string',
                'down_text' => 'string',
        ]);
	}

	public function safeDown()
	{

	}
}