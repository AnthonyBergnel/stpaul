<?php
class Sejour
{
	protected $sejno, $sejintitule, $sejmontantmbi, $sejdtedeb, $sejduree;

	public function __construct($donnees)
	{
		$this->setSejno($donnees[0]);
		$this->setSejintitule($donnees[1]);
		$this->setSejmontantmbi($donnees[2]);
		$this->setSejdtedeb($donnees[3]);
		$this->setSejduree($donnees[4]);
	}

	public function setSejno($sejno)
	{
		$this->sejno=$sejno;
	}

	public function setSejintitule($sejintitule)
	{
		$this->sejintitule=$sejintitule;
	}

	public function setSejmontantmbi($sejmontantmbi)
	{
		$this->sejmontantmbi=$sejmontantmbi;
	}

	public function setSejdtedeb($sejdtedeb)
	{
		$this->sejdtedeb=$sejdtedeb;
	}

	public function setSejduree($sejduree)
	{
		$this->sejduree=$sejduree;
	}

	public function getSejno()
	{
		return $this->$sejno;
	}

	public function getSejintitule()
	{
		return $this->sejintitule;
	}

	public function getSejmontantmbi()
	{
		return $this->sejmontantmbi;
	}

	public function getSejdtedeb()
	{
		return $this->sejdtedeb;
	}

	public function getSejduree()
	{
		return $this->sejduree;
	}

	public function afficheSejour()
	{
		$dateDeb=date_create($this->getSejdtedeb());
		$dateFin=date("d/m/Y", strtotime(date_format($dateDeb, "Y-m-d")." + ".$this->getSejduree()." DAYS"));
		?>
        <h2><p><?php echo $this->getSejintitule(); ?></p></h2>
		<?php echo $this->getSejmontantmbi().'€'; ?><br/>
		<?php echo 'A partir du '.date_format($dateDeb, "d/m/Y")." au ".$dateFin; ?>
		<?php echo $this->getSejduree().' nuits';
	}
}
?>