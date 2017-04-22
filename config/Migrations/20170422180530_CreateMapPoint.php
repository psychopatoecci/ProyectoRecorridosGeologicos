<?php
use Migrations\AbstractMigration;

class CreateMapPoint extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('map_point');
        $table->addColumn('path', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('sequence_number', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('id_page', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('latitude', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('longitude', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
