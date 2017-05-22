<?php
use Migrations\AbstractMigration;

class AlterMapPoints2 extends AbstractMigration
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
        $table = $this->table('map_points');
        $table->addColumn('name', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->changeColumn('latitude', 'float');
        $table->changeColumn('longitude', 'float');
        $table->update();
    }
}
