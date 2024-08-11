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
            "title" => $this->string(50)->notNull(),

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }


}
