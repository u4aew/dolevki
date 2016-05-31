<?php

class m160527_071226_addReadyTimesRecords extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $quartals = ["Первый","Второй","Третий","Четвертый"];
        $years = [2016,2017,2018,2019];
        $result[0] = "------";
        for ($i = 1; $i<17; $i++)
        {
            $text = $quartals[($i-1) % 4]." квартал ".$years[($i-1)/4];
            $model = new ReadyTime();
            $model->text = $text;
            $model->zindex = $i;
            $model->save();
        }


    }

	public function safeDown()
	{

	}
}