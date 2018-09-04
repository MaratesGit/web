<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Full_db extends CI_Migration {

    public function up()
        {
 
   $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            )
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('blog');
        
        }
            public function down()
        {
            $this->dbforge->drop_table('blog');
        }
}
