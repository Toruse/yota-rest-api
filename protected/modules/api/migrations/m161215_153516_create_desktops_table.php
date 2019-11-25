<?php

class m161215_153516_create_desktops_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('desktops', array(
            'id' => 'pk',
            'id_region' => 'integer',
            'name' => 'string NOT NULL',
            'period'=> 'string NOT NULL',//(year,month,minimum)
            'time'=> 'string NOT NULL', //(hour | free)
            'speed'=> 'string NOT NULL',//(Kb/s)
            'price'=> 'float DEFAULT 0',
            'active'=> 'boolean DEFAULT 1',
        ));
        $this->createIndex('id_region', 'desktops', 'id_region');
        $this->addForeignKey('fk-desktops-id_region', 'desktops', 'id_region', 'regions', 'id','CASCADE','CASCADE');
    }

	public function down()
	{
        $this->dropTable('desktops');
        echo "m161215_153516_create_desktops_table does not support migration down.\n";
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