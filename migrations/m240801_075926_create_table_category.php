<?php

use yii\db\Migration;

/**
 * Class m240801_075926_create_table_category
 */
class m240801_075926_create_table_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240801_075926_create_table_category cannot be reverted.\n";

        return false;
    }
    */
}
