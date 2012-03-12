<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * WolfAuth
 *
 * An open source driver based authentication library for Codeigniter
 *
 * @package   WolfAuth
 * @author    Dwayne Charrington
 * @copyright Copyright (c) 2012 Dwayne Charrington.
 * @link      http://ilikekillnerds.com
 * @license   http://www.apache.org/licenses/LICENSE-2.0.html
 * @version   2.0
 */

class Wolfauth_permissions extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Has Permission
     *
     * Has the current user got permission to access this resource?
     *
     * @param $permission
     * @return bool
     */
    public function has_permission($permission = '')
    {
        // If we have no permission check current URL
        if ($permission == '')
        {
            // The permission string by default is the whole URL string
            $permission = trim($this->uri->uri_string(), '/');
        }

        $user = $this->get_user();

        $this->db->select('permissions.permission')->where('role_id', $user->role_id)->get($this->config->item('table.permissions', 'wolfauth'));

        return ($this->db->num_rows() == 1) ? TRUE : FALSE;
    }

    /**
     * Add Permission
     *
     * Adds a permission to a role
     *
     * @param $role_id
     * @param $permission
     * @return bool
     */
    public function add_permission($role_id, $permission)
    {
        $data['role_id'] = $role_id;
        $data['permission'] = $permission;
        $this->db->insert($this->CI->config->item('table.permissions', 'wolfauth'), $data);

        return ($this->db->affected_rows() == 1) ? TRUE : FALSE;
    }

    /**
     * Edit Permission
     *
     * Allows you to edit a permission via the admin area
     *
     * @param int $permission_id
     * @param $data
     * @return bool
     */
    public function edit_permission($permission_id, $data)
    {
        // Make sure we have some data
        if (isset($data['id']) AND isset($data['permission']))
        {
            $this->db->where('id', $data['id']);
            $this->db->update($this->CI->config->item('table.permissions', 'wolfauth'), array('permission' => $data['permission']));

            return ($this->db->affected_rows() == 1) ? TRUE : FALSE;
        }
    }

    /**
     * Delete Permission
     *
     * Delete a permission from the permissions table
     *
     * @param int $permission_id
     * @return bool
     */
    public function delete_permission($permission_id)
    {
        $this->db->where('id', $permission_id);
        $this->db->delete($this->CI->config->item('table.permissions', 'wolfauth'));

        return ($this->db->affected_rows() == 1) ? TRUE : FALSE;
    }
}