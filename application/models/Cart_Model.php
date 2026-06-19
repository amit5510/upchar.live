<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_Model extends CI_Model {
    
   // Function to retrieve an array with all product information
    function retrieve_products(){
		$query = $this->db->get('product'); // Select the table products
		return $query->result_array(); // Return the results in a array.
    }    
	
	// Add an item to the cart
	function validate_add_cart_item(){
		 
		$id = $this->input->post('product_id'); // Assign posted product_id to $id
		$cty = $this->input->post('quantity'); // Assign posted quantity to $cty
		 
		$this->db->where('product_id', $id); // Select where id matches the posted id
		$query = $this->db->get('product'); // Select the products where a match is found and limit the query by 1
		
		// Check if a row has matched our product id
		if($query->num_rows() > 0){
		 
		// We have a match!
			foreach ($query->result() as $row)
			{
				// Create an array with product information
				$data = array(
					'id'      => $id,
					'qty'     => $cty,
					'image'   => $row->product_image,
					'price'   => $row->product_price,
					'name'    => $row->product_name
				);
	 
				// Add the data to the cart using the insert function that is available because we loaded the cart library
				$this->cart->insert($data); 
				 
				return TRUE; // Finally return TRUE
			}
		 
		}else{
			// Nothing found! Return FALSE! 
			return FALSE;
		}
	}
	
	// Updated the shopping cart
	function validate_update_cart(){
		 
		// Get the total number of items in cart
		 $total =  count($this->cart->contents()); //$this->cart->total_items();
		 
		// Retrieve the posted information
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
	 
		// Cycle true all items and update them
		for($i=0;$i < $total;$i++)
		{
			// Create an array with the products rowid's and quantities. 
			$data = array(
			   'rowid' => $item[$i],
			   'qty'   => $qty[$i]
			);
			 
			// Update the cart with the new information
			$this->cart->update($data);
		}
	 
	}
	
	
	// Add an item to the cart
	function validate_update_cart_item(){
		 
		$rid = $this->input->post('row_id'); // Assign posted product_id to $id
		$id = $this->input->post('product_id'); // Assign posted product_id to $id
		$cty = $this->input->post('quantity'); // Assign posted quantity to $cty
		 
		$this->db->where('product_id', $id); // Select where id matches the posted id
		$query = $this->db->get('product'); // Select the products where a match is found and limit the query by 1
		
		// Check if a row has matched our product id
		if($query->num_rows() > 0){
		 
		// We have a match!
			foreach ($query->result() as $row)
			{
				// Create an array with product information
				$data = array(
					'rowid'      => $rid,
					'id'      => $id,
					'qty'     => $cty,
					'image'   => $row->product_image,
					'price'   => $row->product_price,
					'name'    => $row->product_name
				);
				// Add the data to the cart using the insert function that is available because we loaded the cart library
				$this->cart->update($data); 
				 
				return TRUE; // Finally return TRUE
			}
		 
		}else{
			// Nothing found! Return FALSE! 
			return FALSE;
		}
	}
	
	
	function update_cart_db(){
		//checkif user loggedin
		if(is_loggedin()){
		$user_id = get_userid();
		$cartContentString = serialize($this->cart->contents());
		$udata['CART']=$cartContentString;
		$this->db->where('USERID', $user_id); // Select where id matches the posted id
		$query = $this->db->update('userlogin',$udata);
		}
	}
	
}