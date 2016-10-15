package com.upc.dao;

import java.util.ArrayList;
import java.util.List;

import com.upc.entity.Alumno;
import com.upc.jdbc.ConexionJdbc;

public class AlumnoDao extends ConexionJdbc implements BaseDao<Alumno, Integer> {

	private static final AlumnoDao ALUMNO_DAO;
	
	static{
		ALUMNO_DAO = new AlumnoDao();
		
	}
	
	public static AlumnoDao obtenerAlumnoDao(){
		
		return ALUMNO_DAO;
	}
	
	public void insertar(Alumno e) {
		// TODO Auto-generated method stub
		 try {
				
			 String sQuery = "INSERT INTO Alumno(codigo,password,bloqueado) values(?,?,?)";
			 
			 cn = obtenerConexion();
			 pr = cn.prepareStatement(sQuery);
			 pr.setString(1, e.getCodigo());
			 pr.setString(2, e.getPassword());
			 pr.setBoolean(3, false);
			 pr.execute();
			 rs = pr.getGeneratedKeys();
			 rs.next();
			 e.setIdAlumno(rs.getInt(1));
			 
			} catch (Exception e2) {
				// TODO: handle exception
			}finally{
				cerrar(rs);
				cerrar(pr);
				cerrar(cn);		
			}
			
				
	}

	public void actualizar(Alumno e) {
		// TODO Auto-generated method stub
		try{
			String sQuery = "UPDATE Alumno SET password = ? , codigo = ? , bloqueado = ? WHERE idAlumno=?";
			cn = obtenerConexion();
			pr = cn.prepareStatement(sQuery);
			pr.setString(1, e.getPassword());
			pr.setString(2, e.getCodigo());
			pr.setBoolean(3, e.getBloqueado());
			pr.setInt(4, e.getIdAlumno());
			pr.executeUpdate();
			cn.commit();
			
		}catch(Exception e2){
		    rollback(cn);	
		}finally{
			cerrar(pr);
			cerrar(cn);
		}
	}

	public void eliminar(Integer id) {
		// TODO Auto-generated method stub
		try{
		String sQuery = "DELETE FROM Alumno WHERE idAlumno =?";
		cn = obtenerConexion();
		pr = cn.prepareStatement(sQuery);
		pr.setInt(1, id);
		pr.executeUpdate();
		}catch(Exception e2){
			rollback(cn);
		}finally{
			cerrar(pr);
			cerrar(cn);
			
		}
			
	}

	public Alumno obtener(Integer id) {
		// TODO Auto-generated method stub
	    Alumno alumno = null;
		try {
			String sQuery = "SELECT * FROM Alumno WHERE idAlumno = ?";
			cn = obtenerConexion();
			pr = cn.prepareStatement(sQuery);
			pr.setInt(1, id);
			rs = pr.executeQuery();
		   	
			while(rs.next()){
				alumno = new Alumno();
				alumno.setIdAlumno(rs.getInt("idAlumno"));
				alumno.setPassword(rs.getString("password"));
				alumno.setCodigo(rs.getString("codigo"));
				alumno.setBloqueado(rs.getBoolean("bloqueado"));
			}
		 
		} catch (Exception e) {
			// TODO: handle exception
		}finally{
			cerrar(rs);
			cerrar(pr);
			cerrar(cn);	
		}
		
		return alumno;
	}

	public List<Alumno> listar() {
		// TODO Auto-generated method stub
	    List<Alumno> listaAlumno = null;
		try {
			String sQuery = "SELECT * FROM Alumno";
			cn = obtenerConexion();
			pr = cn.prepareStatement(sQuery);
	
			rs = pr.executeQuery();
		   	
			listaAlumno = new ArrayList<Alumno>();
			while(rs.next()){
				Alumno alumno = new Alumno();
				alumno.setIdAlumno(rs.getInt("idAlumno"));
				alumno.setPassword(rs.getString("password"));
				alumno.setCodigo(rs.getString("codigo"));
				alumno.setBloqueado(rs.getBoolean("bloqueado"));
			   listaAlumno.add(alumno);
			}
		 
		} catch (Exception e) {
			// TODO: handle exception
		}finally{
			cerrar(rs);
			cerrar(pr);
			cerrar(cn);	
		}
		
		return listaAlumno;
	}

	public Alumno obtenerPorCodigo(String codigo) {
		// TODO Auto-generated method stub
	    Alumno alumno = null;
		try {
			String sQuery = "SELECT * FROM Alumno WHERE codigo = ?";
			cn = obtenerConexion();
			pr = cn.prepareStatement(sQuery);
			pr.setString(1, codigo);
			rs = pr.executeQuery();
		   	
			while(rs.next()){
				alumno = new Alumno();
				alumno.setIdAlumno(rs.getInt("idAlumno"));
				alumno.setPassword(rs.getString("password"));
				alumno.setCodigo(rs.getString("codigo"));
				alumno.setBloqueado(rs.getBoolean("bloqueado"));
			}
		 
		} catch (Exception e) {
			// TODO: handle exception
		}finally{
			cerrar(rs);
			cerrar(pr);
			cerrar(cn);	
		}
		
		return alumno;
	}
	
}
