package com.upc.jdbc;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class ConexionJdbc {

	
	protected Connection cn = null;
	protected PreparedStatement pr = null;
	protected ResultSet rs = null;
	
	protected Connection obtenerConexion() throws ClassNotFoundException{
		
		try {
		
		String usuario = "root";
		String password = "root";
		
		Class.forName("com.mysql.jdbc.Driver");
	    
		String url = "jdbc:mysql://localhost:3306/demojava?";
		
		cn = DriverManager.getConnection(url,usuario,password);	
			
		} catch (SQLException ex) {
			  System.out.println("SQLException: " + ex.getMessage());
			  System.out.println("SQLState: " + ex.getSQLState());
			  System.out.println("VendorError: " + ex.getErrorCode());
		} catch (ClassNotFoundException ex){
			  System.out.println("ClassNotFoundException:" + ex.getMessage());
		}
		
		
		return cn;
		
	}
	
	protected void cerrar(Connection cn){
		
		try {
			 cn.close();
		} catch (Exception e) {
			// TODO: handle exception
		}
		
	}
	protected void cerrar(PreparedStatement pr){
		
		try {
			  pr.close();
			
		} catch (Exception e) {
			// TODO: handle exception
		}
		
	}
	
    protected void cerrar(ResultSet rs){
        try {
            rs.close();
        } catch (Exception e) {
        }
    }
    
    protected void rollback(Connection cn){
        try {
            cn.rollback();
        } catch (Exception e) {
       }
    }
	
	
}
