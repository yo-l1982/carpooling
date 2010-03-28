<?PHP
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP version 4                                                        |
// +----------------------------------------------------------------------+
// | Authors: Patrik Hansson  <ic@orestad-linux.se>                       |
// |          Stefan Sager    <stefan_sager@telia.com>                    |
// +----------------------------------------------------------------------+
//
//

class Database {

    var $db_handler;

    var $result;
    var $database_name;
    // }}}
    // {{{ Constructor
    /**
     * Constructor
     * Opens a database-connection to a mysql database-server
     *
     * @param string $db, database
     * @param string $user, username
     * @param string $passwd, database password
     * @param string $host,
     * @return object $this
     */
    function Database($user, $passwd, $host) {

        $this->db_handler = mysql_connect($host, $user, $passwd)
                or die ("Could not connect");

        return $this;
    }

    // }}}
    // {{{ fetchQuery()

    /**
     * Performs both query and fetches data
     *
     * @param string $sql, SQL-statement
     * @param string $fetch_type, either array or hash = associative array
     *
     * @return mixed array
     */
    function fetchQuery($sql, $fetch_type = null) {
        $this->query($sql);

        $data = $this->fetch($fetch_type);

        return $data;
    }

    // }}}
    // {{{ query()

    /**
     * Executes an SQL-query
     *
     * @param string $sql_str, containing a valid SQL-statement
     */
    function query($sql_str) {
        if ($sql_str)
            $this->result = mysql_query($sql_str, $this->db_handler)
                    or die ("Invalid query: ".$sql_str."<br>".mysql_error().".");
        //if no sql_str ignore...
    }

    // }}}
    // {{{ fetch()

    /**
     * Fetch results from database, specified by previous query
     *
     * @param $fetch_type, hash or array
     *
     * @return mixed array
     */
    function fetch($fetch_type = "") {
        $i = 0;
        if (!strcmp($fetch_type, "array")) {
            $data = Array();
            while($row =  mysql_fetch_row($this->result)) {
                $data[$i] = $row;
                $i++;
            }
        }
        elseif (!strcmp($fetch_type, "hash")) {
            $data = Array();
            while($row =  mysql_fetch_array($this->result)) {
                $data[$i] = $row;
                $i++;
            }
        }
        else {
            $data[$i] = mysql_fetch_row($this->result);
        }
        return $data;
    }

    // }}}
    // {{{ getLastId

    /**
     * Fetches the last insert id
     */
    function getLastId() {
        return mysql_insert_id($this->db_handler);
    }

    // }}}
    // {{{ close()

    /**
     * Closes a connection to the database
     * specified by handle
     *
     * @return viod
     */
    function close() {
        mysql_close($this->db_handler);
    }

    function isSetDatabase($db) {
        $databases = array();
        $q = @mysql_query('SHOW DATABASES', $this->db_handler);

        while ($r = @mysql_fetch_array($q)) {
            $databases[] = $r[0];
        }

        if (in_array($db, $databases)) {
            mysql_select_db ($db, $this->db_handler) or die ("Error: ".mysql_error().".");
            $this->database_name = $db;
            return true;
        }
        else {
            
            return false;
        }
    }
}

?>
