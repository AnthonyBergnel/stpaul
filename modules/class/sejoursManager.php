<?php
class SejoursManager
{
	private $_db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function add(sejour $sejour)
	{
		$q=$this->_db->prepare('INSERT INTO
									sejour
									(sejno,
									sejintitule,
									sejmontantmbi,
									sejdtedeb,
									sejduree)
								VALUES
									(:sejno,
									:sejintitule,
									:sejmontantmbi,
									:sejdtedeb,
									:sejduree)');
		$q->execute(array(  'sejno'=>$sejour->getSejno(),
							'sejintitule'=>$sejour->getSejintitule(),
							'sejmontantmbi'=>$sejour->getSejmontantmbi(),
							'sejdtedeb'=>$sejour->getSejdtedeb(),
							'sejduree'=>$sejour->getSejduree()));
	}

	public function delete(sejour $sejour)
	{
		$q=$this->_db->prepare('DELETE FROM
									sejour
								WHERE
									sejno=:sejno');
		$q->execute(array(  'sejno'=>$sejour->getSejno()));
	}

	public function get($sejno)
	{
		$sejno=(int)$sejno;

		$q=$this->_db->query(  'SELECT
									sejno,
									sejintitule,
									sejmontantmbi,
									sejdtedeb,
									sejduree
								FROM
									sejour
								WHERE
									sejno='.$sejno);
		$donnees=$q->fetch(PDO::FETCH_ASSOC);

		return new Sejour($donnees);
	}

	public function getList()
	{
		$sejours=[];
		$q=$this->_db->query('SELECT
									sejno,
									sejintitule,
									sejmontantmbi,
									sejdtedeb,
									sejduree
								FROM
									sejour
								ORDER BY
									sejno');

		while($donnees=$q->fetch(PDO::FETCH_BOTH))
		{
			$sejours[]=new Sejour($donnees);
		}

		return $sejours;
	}

	/*public function update(news $new)
	{
		$q=$this->_db->prepare('UPDATE
									news
								SET
									titre=:titre,
									date=:date,
									texte_nouvelle=:texte_nouvelle
								WHERE
									id=:id');
		$q->execute(array(  'titre'=>$new->getTitre(),
						    'date'=>$new->getDate(),
						    'texte_nouvelle'=>$new->getTexteNouvelle(),
						    'id'=>$new->getId()));
	}*/

	public function setDb(PDO $db)
	{
		$this->_db=$db;
	}
}
?>