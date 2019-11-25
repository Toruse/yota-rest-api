<?php

class m161215_145653_create_tablets_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tablets', array(
            'id' => 'pk',
            'id_region' => 'integer',
            'name' => 'string NOT NULL',
            'day'=> 'float DEFAULT 0',
            'month'=> 'float DEFAULT 0',
            'year'=> 'float DEFAULT 0',
            'active'=> 'boolean DEFAULT 1',
        ));
        $this->createIndex('id_region', 'tablets', 'id_region');
        $this->addForeignKey('fk-tablets-id_region', 'tablets', 'id_region', 'regions', 'id','CASCADE','CASCADE');
    }

	public function down()
	{
        $this->dropTable('tablets');
		echo "m161215_145653_create_tablets_table does not support migration down.\n";
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