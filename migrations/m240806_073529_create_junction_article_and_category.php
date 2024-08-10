<?php

use yii\db\Migration;

/**
 * Class m240806_073529_create_junction_article_and_category
 */
class m240806_073529_create_junction_article_and_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('junction',
            [
                'id' => $this->primaryKey(),
                'id_category' => $this->integer(),
                'id_article' => $this->integer(),
            ]);
        $this->addForeignKey(
            'fk-category',
            'junction',
            'id_category',
            'category',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-article',
            'junction',
            'id_article',
            'article',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'junction-unique',
            'junction',
            ['id_category', 'id_article'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('junction');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240806_073529_create_junction_article_and_category cannot be reverted.\n";

        return false;
    }
    */
}
