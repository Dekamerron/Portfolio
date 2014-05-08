<?php

class db {
	protected $hostname = '';
	protected $username = '';
	protected $password = '';
	protected $database = '';
	private $connection;
	private $selectdb;

	function __construct()
	{
		$this->connection = mysql_connect($this->hostname, $this->username, $this->password) or die( 'Cannot connect ' . mysql_errno());
		$this->selectdb   = mysql_select_db($this->database, $this->connection) or die( 'Cannot select DB ' . mysql_error());
	}

	function __destruct()
	{
		mysql_close($this->connection);
	}

	public function selectArticles($limit = 1000)
	{
		return mysql_query("SELECT * FROM article ORDER BY id DESC LIMIT $limit");
	}

	public function addArticle($title, $body)
	{
		$query = sprintf("INSERT INTO article (title, body) VALUES ('%s', '%s')",
			mysql_real_escape_string($title),
			mysql_real_escape_string($body));

		return mysql_query($query);
	}

	public function updateArticle($title, $body, $id)
	{
		$query = sprintf("UPDATE article SET title='%s', body='%s' WHERE id='%d'",
			mysql_real_escape_string($title),
			mysql_real_escape_string($body),
			$id);

		return mysql_query($query);
	}

	public function deleteArticle($id)
	{
		return mysql_query("DELETE FROM article WHERE id='$id'");
	}

	public function selectOne($id)
	{
		return mysql_query("SELECT * FROM article WHERE id=$id");
	}

	public function fetchArray($sql)
	{
		return mysql_fetch_array($sql);
	}

	public function fetchAssoc($result)
	{
		return mysql_fetch_assoc($result);
	}

	public function affectedRows()
	{
		return mysql_affected_rows();
	}


}
