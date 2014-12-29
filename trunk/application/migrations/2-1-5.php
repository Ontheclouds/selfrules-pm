<?php

$fields = array(
                'id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                                ),
                  'name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '',
                                                ),
                  'formcontent' => array(
                                                 'type' => 'LONGTEXT'
                                                ),
                  'inactive' => array(
                                                 'type' => 'TINYINT',
                                                 'constraint' => '4',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'user_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'created' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          )
                   
);

$this->dbforge->add_field($fields);
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table('custom_quotations', TRUE); 


$fields = array(
                'id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                                ),
                'form' => array(
                                                 'type' => 'LONGTEXT'
                                                ),
                'custom_quotation_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'unsigned' => TRUE,
                                                ),
                'date' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '50',
                                                 'null' => TRUE,
                                                 'default' => '',
                                                ),
                  
                 'status' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '50',
                                                 'null' => TRUE,
                                                 'default' => '',
                                                ),
                  
                  'user_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          )
                   
);

$this->dbforge->add_field($fields);
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table('custom_quotation_requests', TRUE); 