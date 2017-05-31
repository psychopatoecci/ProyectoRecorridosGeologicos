<?php
use Migrations\AbstractMigration;

class Restriction extends AbstractMigration
{

    public function up()
    {
        $this->table('contents')
            ->dropForeignKey([], 'contents_ibfk_1')
            ->update();
        $this->table('map_points')
            ->dropForeignKey([], 'map_points_ibfk_1')
            ->removeIndexByName('id_page')
            ->update();

        $this->table('map_points')            ->changeColumn('latitude', 'float', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->changeColumn('longitude', 'float', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->update();

        $this->table('map_points')            ->addColumn('name', 'text', [
                'after' => 'longitude',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'page_id',
                ],
                [
                    'name' => 'FK_PagesMapPoints',
                ]
            )
            ->update();

        $this->table('contents')            ->addForeignKey(
                'page_id',
                'pages',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('map_points')            ->addForeignKey(
                'page_id',
                'pages',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('contents')
            ->dropForeignKey(
                'page_id'            );
        $this->table('map_points')
            ->dropForeignKey(
                'page_id'            );
        $this->table('map_points')
            ->removeIndexByName('FK_PagesMapPoints')
            ->update();

        $this->table('map_points')            ->changeColumn('latitude', 'text', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('longitude', 'text', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->removeColumn('name')
            ->addIndex(
                [
                    'page_id',
                ],
                [
                    'name' => 'id_page',
                ]
            )
            ->update();

        $this->table('contents')            ->addForeignKey(
                'page_id',
                'pages',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('map_points')            ->addForeignKey(
                'page_id',
                'pages',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }
}

