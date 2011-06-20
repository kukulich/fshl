<?php
/* --------------------------------------------------------------- *
 *        WARNING: ALL CHANGES IN THIS FILE WILL BE LOST
 *
 *   Source language file: C:\Dev\httpd\webroot\fshl\fshl-0.4.18\fshl/lang/PHP_lang.php
 *       Language version: 1.29 (Sign:SHL)
 *
 *            Target file: C:\Dev\httpd\webroot\fshl\fshl-0.4.18\fshl/fshl_cache/PHP_lang.php
 *             Build date: Sun 29.10.2006 12:29:56
 *
 *      Generator version: 0.4.11
 * --------------------------------------------------------------- */
class PHP_lang
{
var $trans,$flags,$data,$delim,$class,$keywords;
var $version,$signature,$initial_state,$ret,$quit;
var $pt,$pti,$generator_version;
var $names;

function PHP_lang () {
	$this->version=1.29;
	$this->signature='SHL';
	$this->generator_version='0.4.11';
	$this->initial_state=0;
	$this->trans=array(0=>array(0=>array(0=>0,1=>0),1=>array(0=>5,1=>0),2=>array(0=>2,1=>-1),3=>array(0=>8,1=>0),4=>array(0=>7,1=>0),5=>array(0=>4,1=>0),6=>array(0=>9,1=>0),7=>array(0=>13,1=>0),8=>array(0=>3,1=>0),9=>array(0=>1,1=>-1),10=>array(0=>4,1=>0)),1=>array(0=>array(0=>12,1=>0),1=>array(0=>12,1=>0)),2=>array(0=>array(0=>12,1=>1)),3=>array(0=>array(0=>3,1=>0),1=>array(0=>12,1=>0)),4=>array(0=>array(0=>12,1=>0),1=>array(0=>4,1=>0),2=>array(0=>12,1=>-1)),5=>array(0=>array(0=>5,1=>0),1=>array(0=>5,1=>0),2=>array(0=>5,1=>0),3=>array(0=>12,1=>1)),6=>array(0=>array(0=>12,1=>0),1=>array(0=>12,1=>0)),7=>array(0=>array(0=>12,1=>0),1=>array(0=>7,1=>0),2=>array(0=>7,1=>0),3=>array(0=>5,1=>0),4=>array(0=>6,1=>0),5=>array(0=>7,1=>0)),8=>array(0=>array(0=>12,1=>0),1=>array(0=>8,1=>0),2=>array(0=>8,1=>0),3=>array(0=>8,1=>0)),9=>array(0=>array(0=>11,1=>0),1=>array(0=>12,1=>1),2=>array(0=>10,1=>0)),10=>array(0=>array(0=>12,1=>1)),11=>array(0=>array(0=>12,1=>1)),13=>null);
	$this->flags=array(0=>0,1=>4,2=>5,3=>4,4=>4,5=>4,6=>4,7=>4,8=>4,9=>4,10=>0,11=>0,13=>8);
	$this->delim=array(0=>array(0=>'_COUNTAB',1=>'$',2=>'ALPHA',3=>'\'',4=>'"',5=>'//',6=>'NUMBER',7=>'?>',8=>'/*',9=>'<?',10=>'#'),1=>array(0=>'<?php',1=>'<?'),2=>array(0=>'!SAFECHAR'),3=>array(0=>'_COUNTAB',1=>'*/'),4=>array(0=>'
',1=>'_COUNTAB',2=>'?>'),5=>array(0=>'$',1=>'{',2=>'}',3=>'!SAFECHAR'),6=>array(0=>'}',1=>'SPACE'),7=>array(0=>'"',1=>'\\\\',2=>'\"',3=>'$',4=>'{$',5=>'_COUNTAB'),8=>array(0=>'\'',1=>'\\\\',2=>'\\\'',3=>'_COUNTAB'),9=>array(0=>'x',1=>'!NUMBER',2=>'NUMBER'),10=>array(0=>'!NUMBER'),11=>array(0=>'!HEXNUM'),13=>null);
	$this->ret=12;
	$this->quit=13;
	$this->names=array(0=>'OUT',1=>'DUMMY_PHP',2=>'FUNCTION',3=>'COMMENT',4=>'COMMENT1',5=>'VAR',6=>'VAR_STR',7=>'QUOTE',8=>'QUOTE1',9=>'NUM',10=>'DEC_NUM',11=>'HEX_NUM',12=>'_RET',13=>'_QUIT');
	$this->data=array(0=>null,1=>null,2=>null,3=>null,4=>null,5=>null,6=>null,7=>null,8=>null,9=>null,10=>null,11=>null,13=>'');
	$this->class=array(0=>null,1=>'xlang',2=>null,3=>'php-comment',4=>'php-comment',5=>'php-var',6=>'php-var',7=>'php-quote',8=>'php-quote',9=>'php-num',10=>'php-num',11=>'php-num',13=>'xlang');
	$this->keywords=array(0=>'php-keyword',1=>array('and'=>1,'or'=>1,'xor'=>1,'__FILE__'=>1,'__LINE__'=>1,'__CLASS__'=>1,'__METHOD__'=>1,'__FUNCTION__'=>1,'exception'=>1,'php_user_filter'=>1,'array'=>2,'as'=>1,'break'=>1,'case'=>1,'cfunction'=>1,'class'=>1,'const'=>1,'continue'=>1,'declare'=>1,'default'=>1,'die'=>2,'do'=>1,'echo'=>1,'else'=>1,'elseif'=>1,'empty'=>2,'enddeclare'=>1,'endfor'=>1,'endforeach'=>1,'endif'=>1,'endswitch'=>1,'endwhile'=>2,'eval'=>2,'exit'=>2,'extends'=>1,'for'=>1,'foreach'=>1,'function'=>1,'global'=>1,'if'=>1,'include'=>1,'include_once'=>1,'isset'=>2,'list'=>2,'new'=>1,'old_function'=>1,'print'=>2,'require'=>1,'require_once'=>1,'return'=>1,'static'=>1,'switch'=>1,'unset'=>2,'use'=>1,'var'=>1,'while'=>1,'true'=>1,'false'=>1,'null'=>1,'define'=>2,'defined'=>2,'trigger_error'=>2,'assert'=>2,'final'=>1,'interface'=>1,'implements'=>1,'public'=>1,'private'=>1,'protected'=>1,'abstract'=>1,'clone'=>1,'done'=>1,'try'=>1,'catch'=>1,'throw'=>1,'trace'=>1,'abs'=>2,'acos'=>2,'ada_afetch'=>2,'ada_autocommit'=>2,'ada_close'=>2,'ada_commit'=>2,'ada_connect'=>2,'ada_exec'=>2,'ada_fetchrow'=>2,'ada_fieldname'=>2,'ada_fieldnum'=>2,'ada_fieldtype'=>2,'ada_freeresult'=>2,'ada_numfields'=>2,'ada_numrows'=>2,'ada_result'=>2,'ada_resultall'=>2,'ada_rollback'=>2,'addcslashes'=>2,'addslashes'=>2,'apache_lookup_uri'=>2,'apache_note'=>2,'array_count_values'=>2,'array_flip'=>2,'array_keys'=>2,'array_merge'=>2,'array_pad'=>2,'array_pop'=>2,'array_push'=>2,'array_reverse'=>2,'array_shift'=>2,'array_slice'=>2,'array_splice'=>2,'array_unshift'=>2,'array_values'=>2,'array_walk'=>2,'arsort'=>2,'asin'=>2,'asort'=>2,'aspell_check'=>2,'aspell_check-raw'=>2,'aspell_new'=>2,'aspell_suggest'=>2,'atan'=>2,'atan2'=>2,'base64_decode'=>2,'base64_encode'=>2,'basename'=>2,'base_convert'=>2,'bcadd'=>2,'bccomp'=>2,'bcdiv'=>2,'bcmod'=>2,'bcmul'=>2,'bcpow'=>2,'bcscale'=>2,'bcsqrt'=>2,'bcsub'=>2,'bin2hex'=>2,'bindec'=>2,'ceil'=>2,'chdir'=>2,'checkdate'=>2,'checkdnsrr'=>2,'chgrp'=>2,'chmod'=>2,'chop'=>2,'chown'=>2,'chr'=>2,'chunk_split'=>2,'clearstatcache'=>2,'closedir'=>2,'closelog'=>2,'connection_aborted'=>2,'connection_status'=>2,'connection_timeout'=>2,'contained'=>2,'convert_cyr_string'=>2,'copy'=>2,'cos'=>2,'count'=>2,'cpdf_add_annotation'=>2,'cpdf_add_outline'=>2,'cpdf_arc'=>2,'cpdf_begin_text'=>2,'cpdf_circle'=>2,'cpdf_clip'=>2,'cpdf_close'=>2,'cpdf_closepath'=>2,'cpdf_closepath_fill_stroke'=>2,'cpdf_closepath_stroke'=>2,'cpdf_continue_text'=>2,'cpdf_curveto'=>2,'cpdf_end_text'=>2,'cpdf_fill'=>2,'cpdf_fill_stroke'=>2,'cpdf_finalize'=>2,'cpdf_finalize_page'=>2,'cpdf_import_jpeg'=>2,'cpdf_lineto'=>2,'cpdf_moveto'=>2,'cpdf_open'=>2,'cpdf_output_buffer'=>2,'cpdf_page_init'=>2,'cpdf_place_inline_image'=>2,'cpdf_rect'=>2,'cpdf_restore'=>2,'cpdf_rlineto'=>2,'cpdf_rmoveto'=>2,'cpdf_rotate'=>2,'cpdf_save'=>2,'cpdf_save_to_file'=>2,'cpdf_scale'=>2,'cpdf_setdash'=>2,'cpdf_setflat'=>2,'cpdf_setgray'=>2,'cpdf_setgray_fill'=>2,'cpdf_setgray_stroke'=>2,'cpdf_setlinecap'=>2,'cpdf_setlinejoin'=>2,'cpdf_setlinewidth'=>2,'cpdf_setmiterlimit'=>2,'cpdf_setrgbcolor'=>2,'cpdf_setrgbcolor_fill'=>2,'cpdf_setrgbcolor_stroke'=>2,'cpdf_set_char_spacing'=>2,'cpdf_set_creator'=>2,'cpdf_set_current_page'=>2,'cpdf_set_font'=>2,'cpdf_set_horiz_scaling'=>2,'cpdf_set_keywords'=>2,'cpdf_set_leading'=>2,'cpdf_set_page_animation'=>2,'cpdf_set_subject'=>2,'cpdf_set_text_matrix'=>2,'cpdf_set_text_pos'=>2,'cpdf_set_text_rendering'=>2,'cpdf_set_text_rise'=>2,'cpdf_set_title'=>2,'cpdf_set_word_spacing'=>2,'cpdf_show'=>2,'cpdf_show_xy'=>2,'cpdf_stringwidth'=>2,'cpdf_stroke'=>2,'cpdf_text'=>2,'cpdf_translate'=>2,'crypt'=>2,'current'=>2,'date'=>2,'dbase_add_record'=>2,'dbase_close'=>2,'dbase_create'=>2,'dbase_delete_record'=>2,'dbase_get_record'=>2,'dbase_get_record_with_names'=>2,'dbase_numfields'=>2,'dbase_numrecords'=>2,'dbase_open'=>2,'dbase_pack'=>2,'dbase_replace_record'=>2,'dblist'=>2,'dbmclose'=>2,'dbmdelete'=>2,'dbmexists'=>2,'dbmfetch'=>2,'dbmfirstkey'=>2,'dbminsert'=>2,'dbmnextkey'=>2,'dbmopen'=>2,'dbmreplace'=>2,'debugger_off'=>2,'debugger_on'=>2,'decbin'=>2,'dechex'=>2,'decoct'=>2,'delete'=>2,'dir'=>2,'dirname'=>2,'diskfreespace'=>2,'dl'=>2,'doubleval'=>2,'each'=>2,'easter_date'=>2,'easter_days'=>2,'end'=>2,'ereg'=>2,'eregi'=>2,'eregi_replace'=>2,'ereg_replace'=>2,'error_log'=>2,'error_reporting'=>2,'escapeshellcmd'=>2,'exec'=>2,'exp'=>2,'explode'=>2,'extension_loaded'=>2,'extract'=>2,'fclose'=>2,'fdf_close'=>2,'fdf_create'=>2,'fdf_get_file'=>2,'fdf_get_status'=>2,'fdf_get_value'=>2,'fdf_next_field_name'=>2,'fdf_open'=>2,'fdf_save'=>2,'fdf_set_ap'=>2,'fdf_set_file'=>2,'fdf_set_status'=>2,'fdf_set_value'=>2,'feof'=>2,'fgetc'=>2,'fgetcsv'=>2,'fgets'=>2,'fgetss'=>2,'file'=>2,'fileatime'=>2,'filectime'=>2,'filegroup'=>2,'fileinode'=>2,'filemtime'=>2,'fileowner'=>2,'fileperms'=>2,'filepro'=>2,'filepro_fieldcount'=>2,'filepro_fieldname'=>2,'filepro_fieldtype'=>2,'filepro_fieldwidth'=>2,'filepro_retrieve'=>2,'filepro_rowcount'=>2,'filesize'=>2,'filetype'=>2,'file_exists'=>2,'flock'=>2,'floor'=>2,'flush'=>2,'fopen'=>2,'fpassthru'=>2,'fputs'=>2,'fread'=>2,'frenchtojd'=>2,'fseek'=>2,'fsockopen'=>2,'ftell'=>2,'ftp_cdup'=>2,'ftp_chdir'=>2,'ftp_connect'=>2,'ftp_delete'=>2,'ftp_fget'=>2,'ftp_fput'=>2,'ftp_get'=>2,'ftp_login'=>2,'ftp_mdtm'=>2,'ftp_mkdir'=>2,'ftp_nlist'=>2,'ftp_pasv'=>2,'ftp_put'=>2,'ftp_pwd'=>2,'ftp_quit'=>2,'ftp_rawlist'=>2,'ftp_rename'=>2,'ftp_rmdir'=>2,'ftp_size'=>2,'ftp_systype'=>2,'function_exists'=>2,'func_get_arg'=>2,'func_get_args'=>2,'func_num_args'=>2,'fwrite'=>2,'getallheaders'=>2,'getdate'=>2,'getenv'=>2,'gethostbyaddr'=>2,'gethostbyname'=>2,'gethostbynamel'=>2,'getimagesize'=>2,'getlastmod'=>2,'getmxrr'=>2,'getmyinode'=>2,'getmypid'=>2,'getmyuid'=>2,'getprotobyname'=>2,'getprotobynumber'=>2,'getrandmax'=>2,'getrusage'=>2,'getservbyname'=>2,'getservbyport'=>2,'gettimeofday'=>2,'gettype'=>2,'get_browser'=>2,'get_cfg_var'=>2,'get_current_user'=>2,'get_html_translation_table'=>2,'get_magic_quotes_gpc'=>2,'get_magic_quotes_runtime'=>2,'get_meta_tags'=>2,'gmdate'=>2,'gmmktime'=>2,'gmstrftime'=>2,'gregoriantojd'=>2,'gzclose'=>2,'gzeof'=>2,'gzfile'=>2,'gzgetc'=>2,'gzgets'=>2,'gzgetss'=>2,'gzopen'=>2,'gzpassthru'=>2,'gzputs'=>2,'gzread'=>2,'gzrewind'=>2,'gzseek'=>2,'gztell'=>2,'gzwrite'=>2,'header'=>2,'hexdec'=>2,'htmlentities'=>2,'htmlspecialchars'=>2,'hw_array2objrec'=>2,'hw_children'=>2,'hw_childrenobj'=>2,'hw_close'=>2,'hw_connect'=>2,'hw_cp'=>2,'hw_deleteobject'=>2,'hw_docbyanchor'=>2,'hw_docbyanchorobj'=>2,'hw_documentattributes'=>2,'hw_documentbodytag'=>2,'hw_documentcontent'=>2,'hw_documentsetcontent'=>2,'hw_documentsize'=>2,'hw_edittext'=>2,'hw_error'=>2,'hw_errormsg'=>2,'hw_free_document'=>2,'hw_getanchors'=>2,'hw_getanchorsobj'=>2,'hw_getandlock'=>2,'hw_getchildcoll'=>2,'hw_getchildcollobj'=>2,'hw_getchilddoccoll'=>2,'hw_getchilddoccollobj'=>2,'hw_getobject'=>2,'hw_getobjectbyquery'=>2,'hw_getobjectbyquerycoll'=>2,'hw_getobjectbyquerycollobj'=>2,'hw_getobjectbyqueryobj'=>2,'hw_getparents'=>2,'hw_getparentsobj'=>2,'hw_getremote'=>2,'hw_getremotechildren'=>2,'hw_getsrcbydestobj'=>2,'hw_gettext'=>2,'hw_identify'=>2,'hw_incollections'=>2,'hw_info'=>2,'hw_inscoll'=>2,'hw_insdoc'=>2,'hw_insertdocument'=>2,'hw_insertobject'=>2,'hw_mapid'=>2,'hw_modifyobject'=>2,'hw_mv'=>2,'hw_new_document'=>2,'hw_objrec2array'=>2,'hw_outputdocument'=>2,'hw_pconnect'=>2,'hw_pipedocument'=>2,'hw_root'=>2,'hw_unlock'=>2,'hw_username'=>2,'hw_who'=>2,'ibase_bind'=>2,'ibase_close'=>2,'ibase_connect'=>2,'ibase_execute'=>2,'ibase_fetch_row'=>2,'ibase_free_query'=>2,'ibase_free_result'=>2,'ibase_pconnect'=>2,'ibase_prepare'=>2,'ibase_query'=>2,'ibase_timefmt'=>2,'ifxus_close_slob'=>2,'ifxus_create_slob'=>2,'ifxus_open_slob'=>2,'ifxus_read_slob'=>2,'ifxus_seek_slob'=>2,'ifxus_tell_slob'=>2,'ifxus_write_slob'=>2,'ifx_affected_rows'=>2,'ifx_blobinfile_mode'=>2,'ifx_byteasvarchar'=>2,'ifx_close'=>2,'ifx_connect'=>2,'ifx_copy_blob'=>2,'ifx_create_blob'=>2,'ifx_create_char'=>2,'ifx_do'=>2,'ifx_error'=>2,'ifx_errormsg'=>2,'ifx_fetch_row'=>2,'ifx_fieldproperties'=>2,'ifx_fieldtypes'=>2,'ifx_free_blob'=>2,'ifx_free_char'=>2,'ifx_free_result'=>2,'ifx_free_slob'=>2,'ifx_getsqlca'=>2,'ifx_get_blob'=>2,'ifx_get_char'=>2,'ifx_htmltbl_result'=>2,'ifx_nullformat'=>2,'ifx_num_fields'=>2,'ifx_num_rows'=>2,'ifx_pconnect'=>2,'ifx_prepare'=>2,'ifx_query'=>2,'ifx_textasvarchar'=>2,'ifx_update_blob'=>2,'ifx_update_char'=>2,'ignore_user_abort'=>2,'imagearc'=>2,'imagechar'=>2,'imagecharup'=>2,'imagecolorallocate'=>2,'imagecolorat'=>2,'imagecolorclosest'=>2,'imagecolorexact'=>2,'imagecolorresolve'=>2,'imagecolorset'=>2,'imagecolorsforindex'=>2,'imagecolorstotal'=>2,'imagecolortransparent'=>2,'imagecopyresized'=>2,'imagecreate'=>2,'imagecreatefromgif'=>2,'imagedashedline'=>2,'imagedestroy'=>2,'imagefill'=>2,'imagefilledpolygon'=>2,'imagefilledrectangle'=>2,'imagefilltoborder'=>2,'imagefontheight'=>2,'imagefontwidth'=>2,'imagegif'=>2,'imageinterlace'=>2,'imageline'=>2,'imageloadfont'=>2,'imagepolygon'=>2,'imagepsbbox'=>2,'imagepsencodefont'=>2,'imagepsfreefont'=>2,'imagepsloadfont'=>2,'imagepstext'=>2,'imagerectangle'=>2,'imagesetpixel'=>2,'imagestring'=>2,'imagestringup'=>2,'imagesx'=>2,'imagesy'=>2,'imagettfbbox'=>2,'imagettftext'=>2,'imap_8bit'=>2,'imap_alerts'=>2,'imap_append'=>2,'imap_base64'=>2,'imap_binary'=>2,'imap_body'=>2,'imap_check'=>2,'imap_clearflag_full'=>2,'imap_close'=>2,'imap_createmailbox'=>2,'imap_delete'=>2,'imap_deletemailbox'=>2,'imap_errors'=>2,'imap_expunge'=>2,'imap_fetchbody'=>2,'imap_fetchheader'=>2,'imap_fetchstructure'=>2,'imap_getmailboxes'=>2,'imap_getsubscribed'=>2,'imap_header'=>2,'imap_headers'=>2,'imap_last_error'=>2,'imap_listmailbox'=>2,'imap_listsubscribed'=>2,'imap_mailboxmsginfo'=>2,'imap_mail_copy'=>2,'imap_mail_move'=>2,'imap_msgno'=>2,'imap_num_msg'=>2,'imap_num_recent'=>2,'imap_open'=>2,'imap_ping'=>2,'imap_qprint'=>2,'imap_renamemailbox'=>2,'imap_reopen'=>2,'imap_rfc822_parse_adrlist'=>2,'imap_rfc822_write_address'=>2,'imap_scanmailbox'=>2,'imap_search'=>2,'imap_setflag_full'=>2,'imap_sort'=>2,'imap_status'=>2,'imap_subscribe'=>2,'imap_uid'=>2,'imap_undelete'=>2,'imap_unsubscribe'=>2,'implode'=>2,'intval'=>2,'in_array'=>2,'iptcparse'=>2,'is_array'=>2,'is_dir'=>2,'is_double'=>2,'is_executable'=>2,'is_file'=>2,'is_float'=>2,'is_int'=>2,'is_integer'=>2,'is_link'=>2,'is_long'=>2,'is_object'=>2,'is_readable'=>2,'is_real'=>2,'is_string'=>2,'is_writeable'=>2,'jddayofweek'=>2,'jdmonthname'=>2,'jdtofrench'=>2,'jdtogregorian'=>2,'jdtojewish'=>2,'jdtojulian'=>2,'jewishtojd'=>2,'join'=>2,'juliantojd'=>2,'key'=>2,'krsort'=>2,'ksort'=>2,'ldap_add'=>2,'ldap_bind'=>2,'ldap_close'=>2,'ldap_connect'=>2,'ldap_count_entries'=>2,'ldap_delete'=>2,'ldap_dn2ufn'=>2,'ldap_err2str'=>2,'ldap_errno'=>2,'ldap_error'=>2,'ldap_explode_dn'=>2,'ldap_first_attribute'=>2,'ldap_first_entry'=>2,'ldap_free_result'=>2,'ldap_get_attributes'=>2,'ldap_get_dn'=>2,'ldap_get_entries'=>2,'ldap_get_values'=>2,'ldap_get_values_len'=>2,'ldap_list'=>2,'ldap_modify'=>2,'ldap_mod_add'=>2,'ldap_mod_del'=>2,'ldap_mod_replace'=>2,'ldap_next_attribute'=>2,'ldap_next_entry'=>2,'ldap_read'=>2,'ldap_search'=>2,'ldap_unbind'=>2,'leak'=>2,'link'=>2,'linkinfo'=>2,'log'=>2,'log10'=>2,'lstat'=>2,'ltrim'=>2,'mail'=>2,'max'=>2,'mcal_close'=>2,'mcal_date_compare'=>2,'mcal_date_valid'=>2,'mcal_days_in_month'=>2,'mcal_day_of_week'=>2,'mcal_day_of_year'=>2,'mcal_delete_event'=>2,'mcal_event_init'=>2,'mcal_event_set_alarm'=>2,'mcal_event_set_category'=>2,'mcal_event_set_class'=>2,'mcal_event_set_description'=>2,'mcal_event_set_end'=>2,'mcal_event_set_recur_daily'=>2,'mcal_event_set_recur_monthly_mday'=>2,'mcal_event_set_recur_monthly_wday'=>2,'mcal_event_set_recur_weekly'=>2,'mcal_event_set_recur_yearly'=>2,'mcal_event_set_start'=>2,'mcal_event_set_title'=>2,'mcal_fetch_current_stream_event'=>2,'mcal_fetch_event'=>2,'mcal_is_leap_year'=>2,'mcal_list_alarms'=>2,'mcal_list_events'=>2,'mcal_next_recurrence'=>2,'mcal_open'=>2,'mcal_snooze'=>2,'mcal_store_event'=>2,'mcal_time_valid'=>2,'mcrypt_cbc'=>2,'mcrypt_cfb'=>2,'mcrypt_create_iv'=>2,'mcrypt_ecb'=>2,'mcrypt_get_block_size'=>2,'mcrypt_get_cipher_name'=>2,'mcrypt_get_key_size'=>2,'mcrypt_ofb'=>2,'md5'=>2,'metaphone'=>2,'mhash'=>2,'mhash_count'=>2,'mhash_get_block_size'=>2,'mhash_get_hash_name'=>2,'microtime'=>2,'min'=>2,'mkdir'=>2,'mktime'=>2,'modifiers'=>2,'msql'=>2,'msql_affected_rows'=>2,'msql_close'=>2,'msql_connect'=>2,'msql_createdb'=>2,'msql_create_db'=>2,'msql_data_seek'=>2,'msql_dbname'=>2,'msql_dropdb'=>2,'msql_drop_db'=>2,'msql_error'=>2,'msql_fetch_array'=>2,'msql_fetch_field'=>2,'msql_fetch_object'=>2,'msql_fetch_row'=>2,'msql_fieldflags'=>2,'msql_fieldlen'=>2,'msql_fieldname'=>2,'msql_fieldtable'=>2,'msql_fieldtype'=>2,'msql_field_seek'=>2,'msql_freeresult'=>2,'msql_free_result'=>2,'msql_listdbs'=>2,'msql_listfields'=>2,'msql_listtables'=>2,'msql_list_dbs'=>2,'msql_list_fields'=>2,'msql_list_tables'=>2,'msql_numfields'=>2,'msql_numrows'=>2,'msql_num_fields'=>2,'msql_num_rows'=>2,'msql_pconnect'=>2,'msql_query'=>2,'msql_regcase'=>2,'msql_result'=>2,'msql_selectdb'=>2,'msql_select_db'=>2,'msql_tablename'=>2,'mssql_close'=>2,'mssql_connect'=>2,'mssql_data_seek'=>2,'mssql_fetch_array'=>2,'mssql_fetch_field'=>2,'mssql_fetch_object'=>2,'mssql_fetch_row'=>2,'mssql_field_seek'=>2,'mssql_free_result'=>2,'mssql_num_fields'=>2,'mssql_num_rows'=>2,'mssql_pconnect'=>2,'mssql_query'=>2,'mssql_result'=>2,'mssql_select_db'=>2,'mt_getrandmax'=>2,'mt_rand'=>2,'mt_srand'=>2,'mysql_affected_rows'=>2,'mysql_change_user'=>2,'mysql_close'=>2,'mysql_connect'=>2,'mysql_create_db'=>2,'mysql_data_seek'=>2,'mysql_db_query'=>2,'mysql_drop_db'=>2,'mysql_errno'=>2,'mysql_error'=>2,'mysql_fetch_array'=>2,'mysql_fetch_field'=>2,'mysql_fetch_lengths'=>2,'mysql_fetch_object'=>2,'mysql_fetch_row'=>2,'mysql_field_flags'=>2,'mysql_field_len'=>2,'mysql_field_name'=>2,'mysql_field_seek'=>2,'mysql_field_table'=>2,'mysql_field_type'=>2,'mysql_free_result'=>2,'mysql_insert_id'=>2,'mysql_list_dbs'=>2,'mysql_list_fields'=>2,'mysql_list_tables'=>2,'mysql_num_fields'=>2,'mysql_num_rows'=>2,'mysql_pconnect'=>2,'mysql_query'=>2,'mysql_result'=>2,'mysql_select_db'=>2,'mysql_tablename'=>2,'next'=>2,'nl2br'=>2,'number_format'=>2,'ocibindbyname'=>2,'ocicolumnisnull'=>2,'ocicolumnname'=>2,'ocicolumnsize'=>2,'ocicolumntype'=>2,'ocicommit'=>2,'ocidefinebyname'=>2,'ocierror'=>2,'ociexecute'=>2,'ocifetch'=>2,'ocifetchinto'=>2,'ocifetchstatement'=>2,'ocifreecursor'=>2,'ocifreestatement'=>2,'ociinternaldebug'=>2,'ocilogoff'=>2,'ocilogon'=>2,'ocinewcursor'=>2,'ocinewdescriptor'=>2,'ocinlogon'=>2,'ocinumcols'=>2,'ociparse'=>2,'ociplogon'=>2,'ociresult'=>2,'ocirollback'=>2,'ocirowcount'=>2,'ociserverversion'=>2,'ocistatementtype'=>2,'octdec'=>2,'odbc_autocommit'=>2,'odbc_binmode'=>2,'odbc_close'=>2,'odbc_close_all'=>2,'odbc_commit'=>2,'odbc_connect'=>2,'odbc_cursor'=>2,'odbc_do'=>2,'odbc_exec'=>2,'odbc_execute'=>2,'odbc_fetch_into'=>2,'odbc_fetch_row'=>2,'odbc_field_len'=>2,'odbc_field_name'=>2,'odbc_field_type'=>2,'odbc_free_result'=>2,'odbc_longreadlen'=>2,'odbc_num_fields'=>2,'odbc_num_rows'=>2,'odbc_pconnect'=>2,'odbc_prepare'=>2,'odbc_result'=>2,'odbc_result_all'=>2,'odbc_rollback'=>2,'odbc_setoption'=>2,'opendir'=>2,'openlog'=>2,'ora_bind'=>2,'ora_close'=>2,'ora_columnname'=>2,'ora_columntype'=>2,'ora_commit'=>2,'ora_commitoff'=>2,'ora_commiton'=>2,'ora_error'=>2,'ora_errorcode'=>2,'ora_exec'=>2,'ora_fetch'=>2,'ora_getcolumn'=>2,'ora_logoff'=>2,'ora_logon'=>2,'ora_open'=>2,'ora_parse'=>2,'ora_rollback'=>2,'ord'=>2,'pack'=>2,'parse_str'=>2,'parse_url'=>2,'passthru'=>2,'pattern'=>2,'pclose'=>2,'pdf_add_annotation'=>2,'pdf_add_outline'=>2,'pdf_arc'=>2,'pdf_begin_page'=>2,'pdf_circle'=>2,'pdf_clip'=>2,'pdf_close'=>2,'pdf_closepath'=>2,'pdf_closepath_fill_stroke'=>2,'pdf_closepath_stroke'=>2,'pdf_close_image'=>2,'pdf_continue_text'=>2,'pdf_curveto'=>2,'pdf_endpath'=>2,'pdf_end_page'=>2,'pdf_execute_image'=>2,'pdf_fill'=>2,'pdf_fill_stroke'=>2,'pdf_get_info'=>2,'pdf_lineto'=>2,'pdf_moveto'=>2,'pdf_open'=>2,'pdf_open_gif'=>2,'pdf_open_jpeg'=>2,'pdf_open_memory_image'=>2,'pdf_place_image'=>2,'pdf_put_image'=>2,'pdf_rect'=>2,'pdf_restore'=>2,'pdf_rotate'=>2,'pdf_save'=>2,'pdf_scale'=>2,'pdf_setdash'=>2,'pdf_setflat'=>2,'pdf_setgray'=>2,'pdf_setgray_fill'=>2,'pdf_setgray_stroke'=>2,'pdf_setlinecap'=>2,'pdf_setlinejoin'=>2,'pdf_setlinewidth'=>2,'pdf_setmiterlimit'=>2,'pdf_setrgbcolor'=>2,'pdf_setrgbcolor_fill'=>2,'pdf_setrgbcolor_stroke'=>2,'pdf_set_char_spacing'=>2,'pdf_set_duration'=>2,'pdf_set_font'=>2,'pdf_set_horiz_scaling'=>2,'pdf_set_info_author'=>2,'pdf_set_info_creator'=>2,'pdf_set_info_keywords'=>2,'pdf_set_info_subject'=>2,'pdf_set_info_title'=>2,'pdf_set_leading'=>2,'pdf_set_text_matrix'=>2,'pdf_set_text_pos'=>2,'pdf_set_text_rendering'=>2,'pdf_set_text_rise'=>2,'pdf_set_transition'=>2,'pdf_set_word_spacing'=>2,'pdf_show'=>2,'pdf_show_xy'=>2,'pdf_stringwidth'=>2,'pdf_stroke'=>2,'pdf_translate'=>2,'pfsockopen'=>2,'pg_close'=>2,'pg_cmdtuples'=>2,'pg_connect'=>2,'pg_dbname'=>2,'pg_errormessage'=>2,'pg_exec'=>2,'pg_fetch_array'=>2,'pg_fetch_object'=>2,'pg_fetch_row'=>2,'pg_fieldisnull'=>2,'pg_fieldname'=>2,'pg_fieldnum'=>2,'pg_fieldprtlen'=>2,'pg_fieldsize'=>2,'pg_fieldtype'=>2,'pg_freeresult'=>2,'pg_getlastoid'=>2,'pg_host'=>2,'pg_loclose'=>2,'pg_locreate'=>2,'pg_loopen'=>2,'pg_loread'=>2,'pg_loreadall'=>2,'pg_lounlink'=>2,'pg_lowrite'=>2,'pg_numfields'=>2,'pg_numrows'=>2,'pg_options'=>2,'pg_pconnect'=>2,'pg_port'=>2,'pg_result'=>2,'pg_tty'=>2,'phpinfo'=>2,'phpversion'=>2,'pi'=>2,'popen'=>2,'pos'=>2,'posix_ctermid'=>2,'posix_getcwd'=>2,'posix_getegid'=>2,'posix_geteuid'=>2,'posix_getgid'=>2,'posix_getgrgid'=>2,'posix_getgrnam'=>2,'posix_getgroups'=>2,'posix_getlogin'=>2,'posix_getpgid'=>2,'posix_getpgrp'=>2,'posix_getpid'=>2,'posix_getppid'=>2,'posix_getpwnam'=>2,'posix_getpwuid'=>2,'posix_getrlimit'=>2,'posix_getuid'=>2,'posix_isatty'=>2,'posix_kill'=>2,'posix_mkfifo'=>2,'posix_setgid'=>2,'posix_setpgid'=>2,'posix_setsid'=>2,'posix_setuid'=>2,'posix_times'=>2,'posix_ttyname'=>2,'posix_uname'=>2,'pow'=>2,'preg_grep'=>2,'preg_match'=>2,'preg_match_all'=>2,'preg_quote'=>2,'preg_replace'=>2,'preg_split'=>2,'prev'=>2,'printf'=>2,'putenv'=>2,'quoted_printable_decode'=>2,'quotemeta'=>2,'rand'=>2,'range'=>2,'rawurldecode'=>2,'rawurlencode'=>2,'readdir'=>2,'readfile'=>2,'readgzfile'=>2,'readlink'=>2,'recode_file'=>2,'recode_string'=>2,'register_shutdown_function'=>2,'rename'=>2,'reset'=>2,'rewind'=>2,'rewinddir'=>2,'rmdir'=>2,'round'=>2,'rsort'=>2,'sem_acquire'=>2,'sem_get'=>2,'sem_release'=>2,'serialize'=>2,'session_decode'=>2,'session_destroy'=>2,'session_encode'=>2,'session_id'=>2,'session_is_registered'=>2,'session_module_name'=>2,'session_name'=>2,'session_register'=>2,'session_save_path'=>2,'session_start'=>2,'session_unregister'=>2,'setcookie'=>2,'setlocale'=>2,'settype'=>2,'set_file_buffer'=>2,'set_magic_quotes_runtime'=>2,'set_socket_blocking'=>2,'set_time_limit'=>2,'shm_attach'=>2,'shm_detach'=>2,'shm_get_var'=>2,'shm_put_var'=>2,'shm_remove'=>2,'shm_remove_var'=>2,'shuffle'=>2,'similar_text'=>2,'sin'=>2,'sizeof'=>2,'sleep'=>2,'snmpget'=>2,'snmpset'=>2,'snmpwalk'=>2,'snmpwalkoid'=>2,'snmp_get_quick_print'=>2,'snmp_set_quick_print'=>2,'solid_close'=>2,'solid_connect'=>2,'solid_exec'=>2,'solid_fetchrow'=>2,'solid_fieldname'=>2,'solid_fieldnum'=>2,'solid_freeresult'=>2,'solid_numfields'=>2,'solid_numrows'=>2,'solid_result'=>2,'sort'=>2,'soundex'=>2,'split'=>2,'sprintf'=>2,'sql_regcase'=>2,'sqrt'=>2,'srand'=>2,'stat'=>2,'strcasecmp'=>2,'strchr'=>2,'strcmp'=>2,'strcspn'=>2,'strftime'=>2,'stripcslashes'=>2,'stripslashes'=>2,'strip_tags'=>2,'stristr'=>2,'strlen'=>2,'strpos'=>2,'strrchr'=>2,'strrev'=>2,'strrpos'=>2,'strspn'=>2,'strstr'=>2,'strtok'=>2,'strtolower'=>2,'strtoupper'=>2,'strtr'=>2,'strval'=>2,'str_repeat'=>2,'str_replace'=>2,'substr'=>2,'substr_replac'=>2,'sybase_affected_rows'=>2,'sybase_close'=>2,'sybase_connect'=>2,'sybase_data_seek'=>2,'sybase_fetch_array'=>2,'sybase_fetch_field'=>2,'sybase_fetch_object'=>2,'sybase_fetch_row'=>2,'sybase_field_seek'=>2,'sybase_free_result'=>2,'sybase_num_fields'=>2,'sybase_num_rows'=>2,'sybase_pconnect'=>2,'sybase_query'=>2,'sybase_result'=>2,'sybase_select_db'=>2,'symlink'=>2,'syntax'=>2,'syslog'=>2,'system'=>2,'tan'=>2,'tempnam'=>2,'time'=>2,'touch'=>2,'trim'=>2,'uasort'=>2,'ucfirst'=>2,'ucwords'=>2,'uksort'=>2,'umask'=>2,'uniqid'=>2,'unlink'=>2,'unpack'=>2,'unserialize'=>2,'urldecode'=>2,'urlencode'=>2,'usleep'=>2,'usort'=>2,'utf8_decode'=>2,'utf8_encode'=>2,'virtual'=>2,'vm_addalias'=>2,'vm_adduser'=>2,'vm_delalias'=>2,'vm_deluser'=>2,'vm_passwd'=>2,'wddx_add_vars'=>2,'wddx_deserialize'=>2,'wddx_packet_end'=>2,'wddx_packet_start'=>2,'wddx_serialize_value'=>2,'wddx_serialize_vars'=>2,'xml_error_string'=>2,'xml_get_current_byte_index'=>2,'xml_get_current_column_number'=>2,'xml_get_current_line_number'=>2,'xml_get_error_code'=>2,'xml_parse'=>2,'xml_parser_create'=>2,'xml_parser_free'=>2,'xml_parser_get_option'=>2,'xml_parser_set_option'=>2,'xml_set_character_data_handler'=>2,'xml_set_default_handler'=>2,'xml_set_element_handler'=>2,'xml_set_external_entity_ref_handler'=>2,'xml_set_notation_decl_handler'=>2,'xml_set_object'=>2,'xml_set_processing_instruction_handler'=>2,'xml_set_unparsed_entity_decl_handler'=>2,'yp_errno'=>2,'yp_err_string'=>2,'yp_first'=>2,'yp_get_default_domain'=>2,'yp_master'=>2,'yp_match'=>2,'yp_next'=>2,'yp_order'=>2),2=>false);
}

// OUT
function getw0 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if(($c1=="\t"||$c1=="\n")){
			return array(0,$c1,$o,1,$i-$start);
		}
		if($c1=='$'){
			return array(1,'$',$o,1,$i-$start);
		}
		if(ctype_alpha($c1)){
			return array(2,$c1,$o,1,$i-$start);
		}
		if($c1=='\''){
			return array(3,'\'',$o,1,$i-$start);
		}
		if($c1=='"'){
			return array(4,'"',$o,1,$i-$start);
		}
		if($c2=='//'){
			return array(5,'//',$o,2,$i-$start);
		}
		if(ctype_digit($c1)){
			return array(6,$c1,$o,1,$i-$start);
		}
		if($c2=='?>'){
			return array(7,'?>',$o,2,$i-$start);
		}
		if($c2=='/*'){
			return array(8,'/*',$o,2,$i-$start);
		}
		if($c2=='<?'){
			return array(9,'<?',$o,2,$i-$start);
		}
		if($c1=='#'){
			return array(10,'#',$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// DUMMY_PHP
function getw1 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p++];
		$c3=$c2.$s[$p++];
		$c4=$c3.$s[$p++];
		$c5=$c4.$s[$p];
		if($c5=='<?php'){
			return array(0,'<?php',$o,5,$i-$start);
		}
		if($c2=='<?'){
			return array(1,'<?',$o,2,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// FUNCTION
function getw2 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if(!($c1=='_'||ctype_alnum($c1))){
			return array(0,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// COMMENT
function getw3 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if(($c1=="\t"||$c1=="\n")){
			return array(0,$c1,$o,1,$i-$start);
		}
		if($c2=='*/'){
			return array(1,'*/',$o,2,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// COMMENT1
function getw4 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c1=='
'){
			return array(0,'
',$o,1,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(1,$c1,$o,1,$i-$start);
		}
		if($c2=='?>'){
			return array(2,'?>',$o,2,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// VAR
function getw5 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=='$'){
			return array(0,'$',$o,1,$i-$start);
		}
		if($c1=='{'){
			return array(1,'{',$o,1,$i-$start);
		}
		if($c1=='}'){
			return array(2,'}',$o,1,$i-$start);
		}
		if(!($c1=='_'||ctype_alnum($c1))){
			return array(3,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// VAR_STR
function getw6 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=='}'){
			return array(0,'}',$o,1,$i-$start);
		}
		if(ctype_space($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// QUOTE
function getw7 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c1=='"'){
			return array(0,'"',$o,1,$i-$start);
		}
		if($c2=='\\\\'){
			return array(1,'\\\\',$o,2,$i-$start);
		}
		if($c2=='\"'){
			return array(2,'\"',$o,2,$i-$start);
		}
		if($c1=='$'){
			return array(3,'$',$o,1,$i-$start);
		}
		if($c2=='{$'){
			return array(4,'{$',$o,2,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(5,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// QUOTE1
function getw8 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c1=='\''){
			return array(0,'\'',$o,1,$i-$start);
		}
		if($c2=='\\\\'){
			return array(1,'\\\\',$o,2,$i-$start);
		}
		if($c2=='\\\''){
			return array(2,'\\\'',$o,2,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(3,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// NUM
function getw9 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=='x'){
			return array(0,'x',$o,1,$i-$start);
		}
		if(!ctype_digit($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		if(ctype_digit($c1)){
			return array(2,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// DEC_NUM
function getw10 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if(!ctype_digit($c1)){
			return array(0,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// HEX_NUM
function getw11 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if(!ctype_xdigit($c1)){
			return array(0,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

}
?>