<?php
/** ---------------------------------------------------------------------
 * app/models/ca_acl.php : table access class for table ca_acl
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2008-2012 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 * 
 * @package CollectiveAccess
 * @subpackage models
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License version 3
 * 
 * ----------------------------------------------------------------------
 */
 
 /**
   *
   */
 
 
define('__CA_ACL_NO_ACCESS__', 0);
define('__CA_ACL_READONLY_ACCESS__', 1);
define('__CA_ACL_EDIT_ACCESS__', 2);
define('__CA_ACL_EDIT_DELETE_ACCESS__', 3);
 
 BaseModel::$s_ca_models_definitions['ca_acl'] = array(
 	'NAME_SINGULAR' 	=> _t('access control list'),
 	'NAME_PLURAL' 		=> _t('access control lists'),
 	'FIELDS' 			=> array(
		'acl_id' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_HIDDEN, 
				'IDENTITY' => true, 'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => 'ACL id', 'DESCRIPTION' => 'Identifier for ACL'
		),
		'group_id' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => true, 
				'DEFAULT' => '',
				'LABEL' => 'Group id', 'DESCRIPTION' => 'Identifier for Group'
		),
		'user_id' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => true, 
				'DEFAULT' => '',
				'LABEL' => 'User id', 'DESCRIPTION' => 'Identifier for User'
		),
		'table_num' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => _t('Table num'), 'DESCRIPTION' => _t('Table num'),
				'BOUNDS_VALUE' => array(1,255)
		),
		'row_id' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => 'Row id', 'DESCRIPTION' => 'Identifier for Row'
		),
		'access' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_SELECT, 
				'DISPLAY_WIDTH' => 40, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => _t('Access'), 'DESCRIPTION' => _t('Access'),
				'BOUNDS_CHOICE_LIST' => array(
					_t('no access') => __CA_ACL_NO_ACCESS__,
					_t('can read') => __CA_ACL_READONLY_ACCESS__,
					_t('can edit') => __CA_ACL_EDIT_ACCESS__,
					_t('can edit + delete') => __CA_ACL_EDIT_DELETE_ACCESS__
				)
		),
		'notes' => array(
				'FIELD_TYPE' => FT_TEXT, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => _t('Notes'), 'DESCRIPTION' => _t('Notes'),
				'BOUNDS_LENGTH' => array(0,65535)
		)
	)
);

class ca_acl extends BaseModel {
	# ---------------------------------
	# --- Object attribute properties
	# ---------------------------------
	# Describe structure of content object's properties - eg. database fields and their
	# associated types, what modes are supported, et al.
	#

	# ------------------------------------------------------
	# --- Basic object parameters
	# ------------------------------------------------------
	# what table does this class represent?
	protected $TABLE = 'ca_acl';
	      
	# what is the primary key of the table?
	protected $PRIMARY_KEY = 'acl_id';

	# ------------------------------------------------------
	# --- Properties used by standard editing scripts
	# 
	# These class properties allow generic scripts to properly display
	# records from the table represented by this class
	#
	# ------------------------------------------------------

	# Array of fields to display in a listing of records from this table
	protected $LIST_FIELDS = array('notes');

	# When the list of "list fields" above contains more than one field,
	# the LIST_DELIMITER text is displayed between fields as a delimiter.
	# This is typically a comma or space, but can be any string you like
	protected $LIST_DELIMITER = ' ';

	# What you'd call a single record from this table (eg. a "person")
	protected $NAME_SINGULAR;

	# What you'd call more than one record from this table (eg. "people")
	protected $NAME_PLURAL;

	# List of fields to sort listing of records by; you can use 
	# SQL 'ASC' and 'DESC' here if you like.
	protected $ORDER_BY = array('notes');

	# Maximum number of record to display per page in a listing
	protected $MAX_RECORDS_PER_PAGE = 20; 

	# How do you want to page through records in a listing: by number pages ordered
	# according to your setting above? Or alphabetically by the letters of the first
	# LIST_FIELD?
	protected $PAGE_SCHEME = 'alpha'; # alpha [alphabetical] or num [numbered pages; default]

	# If you want to order records arbitrarily, add a numeric field to the table and place
	# its name here. The generic list scripts can then use it to order table records.
	protected $RANK = '';
	
	
	# ------------------------------------------------------
	# Hierarchical table properties
	# ------------------------------------------------------
	protected $HIERARCHY_TYPE				=	null;
	protected $HIERARCHY_LEFT_INDEX_FLD 	= 	null;
	protected $HIERARCHY_RIGHT_INDEX_FLD 	= 	null;
	protected $HIERARCHY_PARENT_ID_FLD		=	null;
	protected $HIERARCHY_DEFINITION_TABLE	=	null;
	protected $HIERARCHY_ID_FLD				=	null;
	protected $HIERARCHY_POLY_TABLE			=	null;
	
	# ------------------------------------------------------
	# Change logging
	# ------------------------------------------------------
	protected $UNIT_ID_FIELD = null;
	protected $LOG_CHANGES_TO_SELF = false;
	protected $LOG_CHANGES_USING_AS_SUBJECT = array(
		"FOREIGN_KEYS" => array(
		
		),
		"RELATED_TABLES" => array(
		
		)
	);
	# ------------------------------------------------------
	# $FIELDS contains information about each field in the table. The order in which the fields
	# are listed here is the order in which they will be returned using getFields()
	
	protected $FIELDS;
	
	
	static $s_acl_access_value_cache = array();
	
	# ------------------------------------------------------
	# --- Constructor
	#
	# This is a function called when a new instance of this object is created. This
	# standard constructor supports three calling modes:
	#
	# 1. If called without parameters, simply creates a new, empty objects object
	# 2. If called with a single, valid primary key value, creates a new objects object and loads
	#    the record identified by the primary key value
	#
	# ------------------------------------------------------
	public function __construct($pn_id=null) {
		parent::__construct($pn_id);	# call superclass constructor
	}
	# ------------------------------------------------------
	/**
	 * Checks access control list for the specified row and user and returns an access value. Values are:
	 *
	 * __CA_ACL_NO_ACCESS__   (0)
	 * __CA_ACL_READONLY_ACCESS__ (1)
     * __CA_ACL_EDIT_ACCESS__ (2)
     * __CA_ACL_EDIT_DELETE_ACCESS__ (3)
	 *
	 * @param ca_users $t_user A ca_users object
	 * @param int $pn_table_num The table number for the row to check
	 * @param int $pn_row_id The primary key value for the row to check.
	 * @return int An access value 
	 */
	public static function accessForRow($t_user, $pn_table_num, $pn_row_id) {
		if (!is_object($t_user)) { $t_user = new ca_users(); }
		$o_db = new Db();
		
		$vn_user_id = (int)$t_user->getPrimaryKey();
		
		if (isset(ca_acl::$s_acl_access_value_cache[$vn_user_id][$pn_table_num][$pn_row_id])) {
			return ca_acl::$s_acl_access_value_cache[$vn_user_id][$pn_table_num][$pn_row_id];
		}
		
		$vn_access = null;
		
		// try to load ACL for user
		if ($vn_user_id) {
			$qr_res = $o_db->query("
				SELECT max(access) a
				FROM ca_acl
				WHERE
					table_num = ? AND row_id = ? AND user_id = ?
					
			", (int)$pn_table_num, (int)$pn_row_id, $vn_user_id);
			
			if ($qr_res->nextRow()) {
				if (strlen($vs_access = $qr_res->get('a'))) {
					$vn_access = (int)$vs_access;
					if ($vn_access >= __CA_ACL_EDIT_DELETE_ACCESS__) {
						return ca_acl::$s_acl_access_value_cache[$vn_user_id][$pn_table_num][$pn_row_id] = $vn_access; 
					} // max access found so just return
				}
			}
			
			$va_groups = $t_user->getUserGroups();
			if (is_array($va_groups)) {
				$va_group_ids = array_keys($va_groups);
				if (is_array($va_group_ids) && (sizeof($va_group_ids) > 0)) {
					$qr_res = $o_db->query("
						SELECT max(access) a 
						FROM ca_acl
						WHERE
							table_num = ? AND row_id = ? AND group_id IN (?)
							
					", (int)$pn_table_num, (int)$pn_row_id, $va_group_ids);
					
					if ($qr_res->nextRow()) {
						if (strlen($vs_access = $qr_res->get('a'))) {
							$vn_acl_access = (int)$vs_access;
							if ($vn_acl_access >= $vn_access) { $vn_access = $vn_acl_access; }
							if ($vn_access >= __CA_ACL_EDIT_DELETE_ACCESS__) { 
								return ca_acl::$s_acl_access_value_cache[$vn_user_id][$pn_table_num][$pn_row_id] = $vn_access; 
							} // max access found so just return
						}
					}
				}
			}
		}
		
		// Get world access
		$qr_res = $o_db->query("
			SELECT max(access) a 
			FROM ca_acl
			WHERE
				table_num = ? AND row_id = ? AND group_id IS NULL AND user_id IS NULL
				
		", (int)$pn_table_num, (int)$pn_row_id);
		if ($qr_res->nextRow()) {
			if (strlen($vs_access = $qr_res->get('a')) && ((int)$vs_access >= $vn_access)) {
				return ca_acl::$s_acl_access_value_cache[$vn_user_id][$pn_table_num][$pn_row_id] = (int)$vs_access;
			}
		}
		if (!is_null($vn_access)) { 
			return ca_acl::$s_acl_access_value_cache[$vn_user_id][$pn_table_num][$pn_row_id] = $vn_access; 
		}
		
		// If no ACL exists return default
		$o_config = Configuration::load();
		return ca_acl::$s_acl_access_value_cache[$vn_user_id][$pn_table_num][$pn_row_id] = (int)$o_config->get('default_item_access_level');
	}
	# ------------------------------------------------------
}
?>