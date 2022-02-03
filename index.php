<?php
    abstract class DB{
    
        abstract public function DBConnection ();
        abstract public function DBRecrord ();
        abstract public function DBQuery ();
    }    
    
    class  MySQL extends DB{
        public function __construct(){
            $this->DBConnection();
        
        }
         public function DBConnection (){
            echo('Соединение прошло успешно. Welcome mysql' . '<br>');
         }
         public function DBRecrord (){
            echo('Запись в базу данных сделана успешно.' . '<br>');
         }
        public function DBQuery(){
            echo('Получение данных из таблицы...' . '<br>');
        }
    }

    class  Oracle extends DB{

        public function __construct(){
            $this->DBConnection();
        
        }
        public function DBConnection (){
            echo('Соединение прошло успешно. Welcome Oracle' . '<br>');
        }
        public function DBRecrord (){
            echo('Запись в базу данных сделана успешно.' . '<br>');
        }
        public function DBQuery (){
            echo('Получение данных из таблицы...' . '<br>');
        }
    }

    class PostgreSQL extends DB{
        public function __construct(){
            $this->DBConnection();
        
        }
        public function DBConnection (){
            echo('Соединение прошло успешно. Welcome PostgreSQL' . '<br>');
        }
        public function DBRecrord (){
            echo('Запись в базу данных сделана успешно.' . '<br>');
        }
        public function DBQuery (){
            echo('Получение данных из таблицы...' . '<br>');
        }
    }
    

   

abstract class MySQLDbFactory{
    
    abstract static public function CreateDbMySQL ();
   
}    
abstract class PostgreSqlDbFactory{
    
    abstract static  public function CreateDbPostgreSql ();
   
}
abstract class OracleDbFactory{
    
    abstract static  public function CreateDbOracle ();
   
}


class  MySQLFactory extends MySqlDbFactory{
        
    static  public function CreateDbMySQL (){
           return new MySQL;
        }
    }
    class  PostgreSqlFactory extends PostgreSqlDbFactory{
        
        static  public function CreateDbPostgreSql(){
           return new MySQL;
        }
    }
    class OracleFactory extends  OracleDbFactory{
        
        static  public function CreateDbOracle (){
           return new MySQL;
        }
    }

    switch ('mysql') {
        case 'postgress':
            $PostgreSql = PostgreSqlFactory::CreateDbPostgreSql();
          break;
        case 'mysql':
            $MySQL = MySQLFactory::CreateDbMySQL();
            $MySQL-> DBRecrord ();
            $MySQL-> DBQuery ();
          break;
        case 'oracle':
            $Oracle =  OracleFactory::CreateDbOracle();
          break;
        default:
          echo('error');
      }

    
          