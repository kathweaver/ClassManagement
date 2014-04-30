<?php
/***************************************************************************
*									PHP - Upload File Class - Version 1.0
*									Page: class.upload_files.php
*									Developer: Jeffrey M. Johnsf
*									Support: binary.star@verizon.net
*									Created: 05/06/2003
*									Modified: 07/18/2003
****************************************************************************
Purpose: To validate against file uploads to the server.
****************************************************************************
Notes/Comments: This class has (7) variables to be defined for (10) usable functions within
the class. Each function within the class will return a specific option. This class will give you the
option to validate the file extension, validate the file size, check to see if the user that is
trying to upload is in your banned users array, return the max file size in the correct format,
return the file size in the correct format, show your upload directory, show your upload log
directory, write log files to the server, and last but not least, upload files to your upload
directory on your server. You can call all the functions or just one or two. There are also (2)
different variations of the file_upload function. One will not validate the file to see if it is the
correct file type, size, and user, and the other one will. The option for both was given because
you might not want to validate against anything, you might just want the user to be able to 
upload any file. A log is also kept for each specific date. Your upload_log_directory should be
its' own directory for this reason. A log file is kept for each day of the year, stating the 
uploaders ip address, the file they uploaded, the file size, and the date and time of upload.
This way if there are any problem uploads such as viruses and what not, you can have the
user's ip address and also add them to your banned array. Each funciton within the array is
commented before the function starts and throughout it. If you still have questions you can
use the support address above to contact me.
****************************************************************************
Class Variables:
1. temp_file_name = The temp file name of the upload (ie. $_FILES['upload']['tmp_name'])
2. file_name = The actual file name of the upload (ie. $_FILES['upload']['name'])
3. upload_dir = The upload directory
4. upload_log_dir =  The directory where the logs should be written
5. max_file_size = The max file size in bytes (ie. .5MB = 524288 bytes)
6. banned_array = An array with all banned ip addresses. If none, make an empty array.
7. ext_array = An array with all valid file extensions. Leave blank to accept all extensions.
****************************************************************************
Functions:
1. validate_extension(): Call this function to see if the extension is valid. If you call this
function you must include the uploaded file's name and the extension array. Even if you are
going to accept all file extensions, you must declare an empty extension array or the outcome
will return false.

2. validate_size(): Call this function to make sure the file size is allowable and not over your
max_file_size parameter. If you call this function you must include the uploaded file's temp
name and the max file size allowable. If either of these variables are missing the outcome
will return false.

3. existing_file(): Call this function to see if a file exists. If it does the functions returns true,
otherwise it returns false.

4. get_file_size(): Call this function to get the acutal upload file size (ie. 2.23 KB). To use this
function you must pass the file's temporary name. If you fail to do so, the outcome will return
false. You do not need to ever call this function if you choose not to, but if you want to display
the user's file size then you will need to. The function will return the file size.

5. get_max_size(): Call this function to get the actual max file size (ie. 512 KB). If you choose
to use this function you must pass the max_file_size variable before doing so. You don't ever
have to call this part of the class if you do not need to, but if you wish to display the actual
maximum file size on the page, you would call this function. If you fail to pass the max_file_size
variable then the function will return an error message, otherwise it returns your max_file_size.

6. validate_user(): This function is used to check if the user uploading the file is allowed to 
upload files to your server. If you use this function you will need to pass your banned_array
of users' ip addresses that are not allowed to upload. If all users are allowed to upload, then
you should send an empty array. If you call this function and don't send an array, the function
will return true, meaning all users can upload.

7. get_upload_directory(): This function will probably never be called by the owner of the web
site, but it can be. This function is used to validate the path. It checks to make sure there is
a backslash on the end of the path. (ie. file_path/) If there is no backslash one is added to
the string. You can call this funciton and it will return your file upload path.

8.get_upload_log_directory(): This function is the same as above except that it checks your
upload log directory for backslashes.

9. upload_file_no_validation: Call this function if you wish to upload the file without any kind
of verification of size, type, or banned user. If you use this function you only need to pass (4)
variables with it. You must pass temp_file_name, file_name, upload_dir, and upload_log_dir.
You do not need to pass anything other variables if this is the only function you are calling 
from the class. If the file is uploaded it returns true, otherwise returns false.

10. upload_file_with_validation(): Call this function to upload a file from a user with complete
verification. It validates the size, type, and checks to see if the user is in your banned users
array. If any of the three are not met, then the file is not uploaded and the outcome returns
false. If all elements are verified, the file is uploaded, a log is written, and the outcome of the
function returns true. You must pass every variable to the class if you are calling this function.
If you fail to do so, you will get an error.
****************************************************************************
Updates: 07/18/2003 -> existing_file() function added
07/18/2003 -> misc. code fixed and updated
****************************************************************************
Code Example: below is an example of how to call every single function in the class...

$upload_class = new Upload_Files;													//Start the class
$upload_class->temp_file_name = trim($_FILES['upload']['tmp_name']);		//Get Temp Name
$upload_class->file_name = trim(strtolower($_FILES['upload']['name']));		//Get File Name
$upload_class->upload_dir = "uploads/";											//Set Upload Dir
$upload_class->upload_log_dir = "uploads/upload_logs/";						//Set Log Dir
$upload_class->max_file_size = 524288;											//Set Max Size
$upload_class->banned_array = array("");											//Set Banned Array
$upload_class->ext_array = array(".jpg",".gif",".jpeg",".png");					//Set Ext. Array

$existing_file = $upload_class->existing_file();									//Call Valid Extension
$valid_ext = $upload_class->validate_extension();								//Call Valid Extension
$valid_size = $upload_class->validate_size();										//Call Valid Size
$valid_user = $upload_class->validate_user();										//Call Valid User
$max_size = $upload_class->get_max_size();										//Call Max Size
$file_size = $upload_class->get_file_size();										//Call File Size
$upload_directory = $upload_class->get_upload_directory();						//Call Upload Dir
$upload_log_directory = $upload_class->get_upload_log_directory();			//Call Log Dir
$upload_file = $upload_class->upload_file_with_validation();						//Call Upload w/ verification
//$upload_file = $upload_class->upload_file_no_validation();					//Call Upload w/o verification

if ($valid_ext) {																		//If valid extension
	print 'Your file is valid!';															//Print outcome to screen
}
****************************************************************************
Additional support for this class can be found here: binary.star@verizon.net
****************************************************************************
License Agreement: Use of this class means that you abide by all the rules and regulations in
the lines to come. The creator of this class (Jeffrey M. Johns) can not and will not be held 
responsible for any mishaps that this script causes and can cause. Use of this class is totally
optional and no one is forcing you to use it. You may change any aspect of the script freely
as long as the original developer (Jeffrey M. Johns) receives credit for the initial layout. You 
may make this script available for download on your site for free, you may NOT charge any
type of fee for this class. If the script is changed in any way, I (Jeffrey M. Johns) will not provide
any type of technical support.
****************************************************************************/

class Upload_Files {

	var $temp_file_name;								//Declare the temp directory
	var $file_name;										//Declare the file name
	var $upload_dir;										//Declare the upload directory
	var $upload_log_dir;									//Declare the upload log directory
	var $max_file_size;									//Declare the max file size
	var $banned_array;									//Declare the banned array
	var $ext_array;										//Declare the extensions array

/***************************************************************************
*									Function: validate_extension()
****************************************************************************
Instructions: This function is used to validate the file extension of the file that is trying to be
uploaded. You can call it by itself, or never call it, and just call the upload_file_with_validate()
function and it will call it for you. If this functon is going to be called by either you or from 
within, then the file_name variable must be passed or the outcome will return false.<br>
****************************************************************************
Variables Required: $file_name, $ext_array
****************************************************************************/
	function validate_extension() {											//Start Validate Extension Function
		$file_name = trim($this->file_name);								//Trim File Name
		$extension = strtolower(strrchr($file_name,"."));					//Get the file extension
		$ext_array = $this->ext_array;										//Declare Extension Array
		$ext_count = count($ext_array);									//Count the number of elements
		if ($file_name) {														//If file name is present, continue
			if (!$ext_array) {													//If no extensions found
				return true;													//Return true
			} else {															//Else
				foreach ($ext_array as $key => $value) {					//Start extension loop
					$first_char = substr($value,0,1);						//Get first character
						if ($first_char <> ".") {								//If not a period,
							$extensions[] = ".".strtolower($value);			//Write value with a period to a new array
						} else {												//Else
							$extensions[] = strtolower($value);				//Write the value to a new array
						}
				}
				foreach ($extensions as $key => $value) {				//Start extract loop of valid extensions
					if ($value == $extension) {								//If extension is equal to any in the array
						$valid_extension = "TRUE";							//Set valid extension to TRUE
					}				
				}
				if ($valid_extension) {										//Check to see if extension is valid
					return true;												//Return true if it is
				} else {														//Else
					return false;												//Return false
				}
			}
		} else {																//Else
			return false;														//Return False
		}
	}

/***************************************************************************
*										Function: validate_size()
****************************************************************************
Instructions: This function is used to validate the file's size. You can call it by itself, or never 
call it, and just call the upload_file_with_validate() function and it will call it for you. If this
function is going to be called by either you or from within, then the temp_file_name and the
max_file_size variables must be passed or the outcome will return false.
****************************************************************************
Variables Required: $temp_file_name, $max_file_size
****************************************************************************/
	function validate_size() {											//Start Validate File Size Array
		$temp_file_name = trim($this->temp_file_name);			//Trim Temp File Name
		$max_file_size = trim($this->max_file_size);					//Trim Max File Size
		if ($temp_file_name) {											//If file is present
			$size = filesize($temp_file_name);							//Get the size of the file
				if ($size > $max_file_size) {								//Set over limit statement
					return false;											//Set to false for over the limit														
				} else {													//Else
					return true;											//Set to true for under limit
				}
		} else {															//Else
			return false;													//Return false
		}	

	}

/***************************************************************************
										Function: existing_file()										
****************************************************************************
Instructions: This function will check to see if the file exists. If the file already exists on the 
server in the upload directory, the function returns true, otherwise it returns false. No renaming
conventions where added because everyone has there own renaming techniques. You should
honestly come up with a system for systematically naming your files on the server. Such as
dropping the file name and adding the id number from the database to it and keeping the file
extension. You should pass unique names into the class, but if you don't it will be caught and 
the file will not get uploaded.
****************************************************************************
Variables Required: $file_name, $upload_dir
****************************************************************************/
	function existing_file() {
		$file_name = trim($this->file_name);				//Extract the file name
		$upload_dir = $this->get_upload_directory();		//Extract the upload directory

		if ($upload_dir == "ERROR") {						//If directory not found
			return true;										//Return true
		} else {												//Else
			$file = $upload_dir . $file_name;				//Set file and file path
			if (file_exists($file)) {							//If file exists
				return true;									//Return true
			} else {											//Else
				return false;									//Return false
			}
		}	
	}

/***************************************************************************
*										Function: get_file_size()
****************************************************************************
Instructions: This function is used by the class when either upload_file function is called. You 
may also call the function on your own to set the file's size to a variable and then use it on
your page. Whether you use this function or not, the temp_file_name variable must be passed
in order to upload files.
****************************************************************************
Variables Required: $temp_file_name
****************************************************************************/
	function get_file_size() {												//Start get file size function
		$temp_file_name = trim($this->temp_file_name);				//Trim Temp File Name
		$kb = 1024;															//Set KB
		$mb = 1024 * $kb;													//Set MB
		$gb = 1024 * $mb;													//Set GB
		$tb = 1024 * $gb;													//Set TB
			if ($temp_file_name) {											//If temp file name is present
				$size = filesize($temp_file_name);							//Get the file's size
					if ($size < $kb) {											//If file's size is less than 1 KB
						$file_size = "$size Bytes";							//Set file_size in bytes, if applicable
					}
					elseif ($size < $mb) {									//If file's size is less than 1 MB
						$final = round($size/$kb,2);						//Find final size
						$file_size = "$final KB";								//Set file_size in kilo-bytes, if applicable
					}
					elseif ($size < $gb) {									//If file's size is less than 1 GB
						$final = round($size/$mb,2);						//Find final size
						$file_size = "$final MB";								//Set file_size in mega-bytes, if applicable
					}
					elseif($size < $tb) {										//If file's size is less than 1 TB
						$final = round($size/$gb,2);						//Find final size
						$file_size = "$final GB";								//Set file_size in giga-bytes, if applicable
					} else {
						$final = round($size/$tb,2);							//Else find final size in TB
						$file_size = "$final TB";								//Set file_size in tera-bytes, if applicable
					}
			} else {
				$file_size = "ERROR: NO FILE PASSED TO get_file_size()";
			}
			return $file_size;
	}

/***************************************************************************
*										Function: get_max_size()
****************************************************************************
Instructions: This function will only be used if you call it. You can call the function from the class
and assign it to a variable so that you can display the actual maximum file size on your web
site. If you call this function you must pass the max_file_size or the function will return an error.
****************************************************************************
Variables Required: $max_file_size
****************************************************************************/
	function get_max_size() {											//Start get max file size function
		$max_file_size = trim($this->max_file_size);					//Trim Max File Size
		$kb = 1024;														//Set KB
		$mb = 1024 * $kb;												//Set MB
		$gb = 1024 * $mb;												//Set GB
		$tb = 1024 * $gb;												//Set TB
		if ($max_file_size) {
			if ($max_file_size < $kb) {									//If file's size is less than 1 KB
				$max_file_size = "max_file_size Bytes";				//Set file_size in bytes, if applicable
			}
			elseif ($max_file_size < $mb) {								//If file's size is less than 1 MB
				$final = round($max_file_size/$kb,2);					//Find final size
				$max_file_size = "$final KB";							//Set file_size in kilo-bytes, if applicable
			}
			elseif ($max_file_size < $gb) {								//If file's size is less than 1 GB
				$final = round($max_file_size/$mb,2);					//Find final size
				$max_file_size = "$final MB";							//Set file_size in mega-bytes, if applicable
			}
			elseif($max_file_size < $tb) {								//If file's size is less than 1 TB
				$final = round($max_file_size/$gb,2);					//Find final size
				$max_file_size = "$final GB";							//Set file_size in giga-bytes, if applicable
			} else {
				$final = round($max_file_size/$tb,2);					//Else find final size in TB
				$max_file_size = "$final TB";							//Set file_size in tera-bytes, if applicable
			}
		} else {
			$max_file_size = "ERROR: NO SIZE PARAMETER PASSED TO  get_max_size()";
		}
		return $max_file_size;

	}

/***************************************************************************
*										Function: validate_user()
****************************************************************************
Instructions: This function is used by the class when you call the upload_file_with_validation
function, or you can just call this function. This function will check to see if the user that is 
trying to upload a file is in your banned users array list. If they are then they are not permitted
to upload files. If you call either this function or the upload_file_with_validation you will need
to pass the banned_array or the outcome will return false. If there are no users on your banned
list, then you can either send an empty array or not send the variable.
****************************************************************************
Variables Required: $banned_array
****************************************************************************/
	function validate_user() {												//Start the validate user funciton
		$banned_array = $this->banned_array;							//Get banned array
		$ip = trim($_SERVER['REMOTE_ADDR']);							//Get IP Address
		$cpu = gethostbyaddr($ip);
		$count = count($banned_array);									//Count the number of banned users
			if ($count < 1) {													//Are there users in the list???
				return true;													//If not user is valid, if so check em!
			} else {
				foreach($banned_array as $key => $value) {				//Start extraction of banned users from the array
					if ($value == $ip ."-". $cpu) {							//If the user's IP address is found in list, continue
						return false;											//Function returns false if user is on list
					} else {													//Else
						return true;											//the function returns true
					}
				}
			}
	}

/***************************************************************************
*									Function: get_upload_directory()
****************************************************************************
Instructions: This function was written to be used internally, but it can be called to be assigned
to a variable. Whether or not you call this function directly or not you are required to pass the
upload_dir variable. If the directory is invalid the $upload_dir will return "ERROR".
****************************************************************************
Variables Required: $upload_dir
****************************************************************************/
	function get_upload_directory() {									//Start Upload Directory Function
		$upload_dir = trim($this->upload_dir);							//Trim Upload Directory
		if ($upload_dir) {													//If upload directory is present
			$ud_len = strlen($upload_dir);								//Get upload directory size
			$last_slash = substr($upload_dir,$ud_len-1,1);			//Get Last Character
				if ($last_slash <> "/") {									//Check to see if the last character is a slash
					$upload_dir = $upload_dir."/";						//Add a backslash if not present
				} else {													//Else
					$upload_dir = $upload_dir;							//If backslash is present, do nothing
				}
				$handle = @opendir($upload_dir);						//Check to see if directory exists
					if ($handle) {
						$upload_dir = $upload_dir;						//Yes it exists
						closedir($handle);								//Close the directory
					} else {
						$upload_dir = "ERROR";							//No it does not exist
					}
		} else {															//Else
			$upload_dir = "ERROR";										//Make Upload directory blank
		}
		chmod ($upload_dir, 0777);
		return $upload_dir;												//Return Upload Directory
	}

/***************************************************************************
*									Function: get_upload_log_directory()
****************************************************************************
Instructions: This function was written to be used internally, but it can be called to be assigned
to a variable. Whether or not you call this function directly or not you are required to pass the
upload_log_dir variable. If the directory is invalid the $upload_log_dir will return "ERROR".
****************************************************************************
Variables Required: $upload_log_dir
****************************************************************************/
	function get_upload_log_directory() {									//Start Upload Log Directory Function
		$upload_log_dir = trim($this->upload_log_dir);					//Trim Upload Log Directory
		if ($upload_log_dir) {													//If upload log directory is present
			$ud_len = strlen($upload_log_dir);								//Get upload log directory size
			$last_slash = substr($upload_log_dir,$ud_len-1,1);			//Get Last Character
				if ($last_slash <> "/") {										//Check to see if the last character is a slash
					$upload_log_dir = $upload_log_dir."/";					//Add a backslash if not present
				} else {														//Else
					$upload_log_dir = $upload_log_dir;						//If backslash is present, do nothing
				}
				$handle = @opendir($upload_log_dir);						//Check to see if directory exists
					if ($handle) {
						$upload_log_dir = $upload_log_dir;					//Yes it exists
						closedir($handle);									//Close the directory
					} else {
						$upload_log_dir = "ERROR";							//No it does not exist
					}
		} else {																//Else
			$upload_log_dir = "ERROR";										//Make Upload log directory blank
		}
		chmod ($upload_log_dir, 0777);
		return $upload_log_dir;												//Return Upload Log Directory
	}

/***************************************************************************
*									Function: upload_file_no_validation()
****************************************************************************
Instructions: This function is used to actually upload the file to the server without any kind
of file or user validation. If this function is called, the file is not checked for size, extension, or
if the user is banned or not, the file is just uploaded to the correct upload directory, and a log
is written about the file. You must pass the following variables: temp_file_name, file_name,
upload_dir, and upload_log_dir. If these variables are not passed the file will not be uploaded
and the outcome will return false.
****************************************************************************
Variables Required: $temp_file_name, $file_name, $upload_dir, $upload_log_dir
****************************************************************************/
	function upload_file_no_validation() {
		$temp_file_name = trim($this->temp_file_name);			//Trim Temp File Name
		$file_name = trim($this->file_name);				//Trim File Name
		$upload_dir = $this->get_upload_directory();					//Trim Upload Directory
		$upload_log_dir = $this->get_upload_log_directory();			//Trim Upload Log Directory
		$file_size = $this->get_file_size();								//Get File Size
		$ip = trim($_SERVER['REMOTE_ADDR']);						//Get IP Address
		$cpu = gethostbyaddr($ip);
		$m = date("m");													//Get month
		$d = date("d");													//Get day
		$y = date("Y");													//Get year
		$date = date("m/d/Y");											//Get today's date
		$time = date("h:i:s A");											//Get now's time

		if (($upload_dir == "ERROR") OR ($upload_log_dir == "ERROR")) {		//Check to see if directories exist
			return false;
		} else {
			if (is_uploaded_file($temp_file_name)) {								//Check if file is uploaded
				if (move_uploaded_file($temp_file_name,$upload_dir . $file_name)) {
					$log = $upload_log_dir.$y."_".$m."_".$d.".txt";				//Log File Name
					$fp = fopen($log,"a+");											//Set File Pointer
					fwrite($fp,"$ip-$cpu | $file_name | $file_size | $date | $time");								//Write File
					fclose($fp);														//Close File Pointer
					return true;														//Return true after upload and written log
				} else {																//Else
					return false;														//Return false	
				}
			} else {																	//Else
				return false;															//Return false
			}
		}
	}

/***************************************************************************
*								Function: upload_file_with_validation()
****************************************************************************
Instructions: This function will do the same as above except it will validate every aspect of the
file. If verfies the file's size, type, and if the user is on the banned list or not. If any of these
three parameters are not met, the file is not uploaded and the outcome returns false. If it
passes all the verification processes then the file is uploaded to the correct folder on the server,
a log is written, and the outcome returns true. You must pass all the variables if you call this
function.
****************************************************************************
Variables Required: $temp_file_name, $file_name, $upload_dir, $upload_log_dir, $banned_array
$ext_array, $max_file_size
****************************************************************************/
	function upload_file_with_validation() {
		$temp_file_name = trim($this->temp_file_name);			//Trim Temp File Name
		$file_name = trim(strtolower($this->file_name));				//Trim File Name
		$upload_dir = $this->get_upload_directory();					//Trim Upload Directory
		$upload_log_dir = $this->get_upload_log_directory();			//Trim Upload Log Directory
		$file_size = $this->get_file_size();								//Get File Size
		$ip = trim($_SERVER['REMOTE_ADDR']);						//Get IP Address
		$cpu = gethostbyaddr($ip);
		$m = date("m");													//Get month
		$d = date("d");													//Get day
		$y = date("Y");													//Get year
		$date = date("m/d/Y");											//Get today's date
		$time = date("h:i:s A");											//Get now's time
		$valid_user = $this->validate_user();							//Validate the user
		$valid_size = $this->validate_size();							//Validate the size
		$valid_ext = $this->validate_extension();						//Validate the extension
		$existing_file = $this->existing_file();							//File Existing


		if (($upload_dir == "ERROR") OR ($upload_log_dir == "ERROR")) {
			return false;
		}
		if ((((!$valid_user) OR (!$valid_size) OR (!$valid_ext) OR ($existing_file)))) {
			return false;
		} else {
			if (is_uploaded_file($temp_file_name)) {								//Check if file is uploaded
				if (move_uploaded_file($temp_file_name,$upload_dir . $file_name)) {
					$log = $upload_log_dir.$y."_".$m."_".$d.".txt";				//Log File Name
					$fp = fopen($log,"a+");											//Set File Pointer
					fwrite($fp,"$ip-$cpu | $file_name | $file_size | $date | $time");								//Write File
					fclose($fp);														//Close File Pointer
					return true;														//Return true after upload and written log
				} else {																//Else
					return false;														//Return False
				}
			} else {																	//Else
				return false;															//Return False
			}
		}
	}
	function create_directory()
	{
		$upload_dir = trim($this->upload_dir);
		$upload_log_dir = trim($this->upload_log_dir);
		if ($upload_dir == "ERROR")
			return false;
		else {	
			mkdir ($upload_dir);
			mkdir ($upload_log_dir);
			chmod ($upload_dir, 0777);
			chmod ($upload_log_dir, 0777);
			return true;
		}
	}
}


?>