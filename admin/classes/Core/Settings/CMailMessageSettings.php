<?php
/**
* GNU General Public License.

* This file is part of ZeusCart V2.3.

* ZeusCart V2.3 is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* ZeusCart V2.3 is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with Foobar. If not, see <http://www.gnu.org/licenses/>.
*
*/

/**
 * CMailMessageSettings
 *
 * This class contains functions to get and update the mail message settings from the database
 *
 * @package		Core_Settings_CMailMessageSettings
 * @category	Core
 * @author		ZeusCart Team
 * @link		http://www.zeuscart.com
 * @version 	2.3
 */

// ------------------------------------------------------------------------


class Core_Settings_CMailMessageSettings
{
	/**
	 * Function gets all the mail messages from the database 
	 * 
	 * 
	 * @return string
	 */	 		
	function showMailMessages()
	{
		include("classes/Display/DMailMessageSettings.php");
		$sql = "SELECT * FROM mail_messages_table";
		$query = new Bin_Query();
		if($query->executeQuery($sql))
		{	
		
			return Display_DMailMessageSettings::showMailMessages($query->records);
		}
		else
		{
			return "No Maill Messages Found";
		}
	}
	
	/**
	 * Function displays the selected mail message from the database for updation 
	 * 
	 * 
	 * @return string
	 */	 
	
	function displayMessage()
    {
        include("classes/Display/DMailMessageSettings.php");
		
		$sql = "SELECT * FROM mail_messages_table where mail_msg_id=".(int)$_GET['id'];
		
		$query = new Bin_Query();
		if($query->executeQuery($sql))
		{		
			return Display_DMailMessageSettings::displayMessage($query->records);
		}
		else
		{
			return "No Contents Found";
		}		
    }
	
	
	/**
	 * Function updates the changes in the selected mail message into the database
	 * 
	 * 
	 * @return array
	 */	 
	
	function editMessage()
	{
		
		$sql = "UPDATE mail_messages_table SET mail_msg = '".$_POST['mailmessages']."' WHERE mail_msg_id=".(int)$_GET['id']; 
		$query = new Bin_Query();		
		if($query->updateQuery($sql))		
		$_SESSION['msg']= "Edited Successfully";		
	}
}
?>