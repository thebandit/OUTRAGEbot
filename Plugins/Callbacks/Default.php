<?php
/**
 *	Callbacks class for OUTRAGEbot.
 *
 *	@ignore
 *	@copyright None
 *	@package OUTRAGEbot
 */


class Callbacks extends Plugins
{
	private
		$aModules = array();
	

	public function onConstruct()
	{
		$this->introduceFunction("getCallbacksCode", array($this, "getCode"));
		$this->getCode();
	}


	public function getCode()
	{
		$this->aModules = array();

		foreach(glob(BASE_DIRECTORY.'/Plugins/Callbacks/on*.php') as $sRFile)
		{
			$sFile = basename($sRFile);
			
			$sCode = file_get_contents($sRFile);
			$sCode = str_replace(array('<?php', '<?', '?>'), '', $sCode);
			
			$this->aModules[$sFile] = $sCode;
		}
		
		echo "* Updated callbacks code.\r\n";
	}
	
	
	public function onJoin($sNickname, $sChannel)
	{
		if(isset($this->aModules['onJoin.php']))
		{
			eval($this->aModules['onJoin.php']);
		}
	}
	
	
	public function onPart($sNickname, $sChannel, $sReason)
	{
		if(isset($this->aModules['onPart.php']))
		{
			eval($this->aModules['onPart.php']);
		}
	}
	
	
	public function onKick($sAdmin, $sKicked, $sChannel, $sReason)
	{
		if(isset($this->aModules['onKick.php']))
		{
			eval($this->aModules['onKick.php']);
		}
	}
	
	
	public function onQuit($sNickname, $sReason)
	{
		if(isset($this->aModules['onQuit.php']))
		{
			eval($this->aModules['onQuit.php']);
		}
	}
	
	
	public function onMode($sChannel, $sModes)
	{
		if(isset($this->aModules['onMode.php']))
		{
			eval($this->aModules['onMode.php']);
		}
	}
	
	
	public function onNick($sOldnick, $sNewnick)
	{
		if(isset($this->aModules['onNick.php']))
		{
			eval($this->aModules['onNick.php']);
		}
	}
	
	
	public function onNotice($sNickname, $sChannel, $sMessage)
	{
		if(isset($this->aModules['onNotice.php']))
		{
			eval($this->aModules['onNotice.php']);
		}
	}
	

	public function onCommand($sNickname, $sChannel, $sCommand, $sArguments)
	{
		if(isset($this->aModules['onCommand.php']))
		{
			eval($this->aModules['onCommand.php']);
		}
	}
	
	
	public function onMessage($sNickname, $sChannel, $sMessage)
	{
		if(isset($this->aModules['onMessage.php']))
		{
			eval($this->aModules['onMessage.php']);
		}
	}


	public function onPrivMessage($sNickname, $sMessage)
	{
		if(isset($this->aModules['onPrivMessage.php']))
		{
			eval($this->aModules['onPrivMessage.php']);
		}
	}
	

	public function onTopic($sChannel, $sTopic)
	{
		if(isset($this->aModules['onTopic.php']))
		{
			eval($this->aModules['onTopic.php']);
		}
	}
}