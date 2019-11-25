<?php

class m161215_093121_create_region_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('regions', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('regions');
		echo "m161215_093121_create_region_table does not support migration down.\n";
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}