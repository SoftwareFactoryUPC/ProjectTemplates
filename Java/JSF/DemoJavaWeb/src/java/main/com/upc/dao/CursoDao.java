package com.upc.dao;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.upc.entity.Curso;
import com.upc.jdbc.ConexionJdbc;

public final class CursoDao extends ConexionJdbc implements BaseDao<Curso, Integer> {

	private static final CursoDao CURSO_DAO;

	static{		
		CURSO_DAO = new CursoDao();
	}
	
	public static CursoDao obtenerCursoDao(){
		
		return CURSO_DAO;
	}
	
	public void insertar(Curso e) {
		// TODO Auto-generated method stub
		
	  try {
		
		 String sQuery = "INSERT INTO Curso(codigo,nombre) values(?,?)";
		 
		 cn = obtenerConexion();
		 pr = cn.prepareStatement(sQuery);
		 pr.setString(1, e.getCodigo());
		 pr.setString(2, e.getNombre());
		 pr.execute();
		 rs = pr.getGeneratedKeys();
		 rs.next();
		 e.setIdCurso(rs.getInt(1));
		 
		} catch (Exception e2) {
			// TODO: handle exception
		}finally{
			cerrar(rs);
			cerrar(pr);
			cerrar(cn);		
		}
		
		
	}

	public void actualizar(Curso e) {
		// TODO Auto-generated method stub
		try{
			String sQuery = "UPDATE Curso SET nombre = ? , codigo = ? WHERE idCurso=?";
			cn = obtenerConexion();
			pr = cn.prepareStatement(sQuery);
			pr.setString(1, e.getNombre());
			pr.setString(2, e.getCodigo());
			pr.setInt(3, e.getIdCurso());
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
		String sQuery = "DELETE FROM Curso WHERE idCurso =?";
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

	public Curso obtener(Integer id) {
		// TODO Auto-generated method stub
	    Curso curso = null;
		try {
			String sQuery = "SELECT * FROM Curso WHERE idCurso = ?";
			cn = obtenerConexion();
			pr = cn.prepareStatement(sQuery);
			pr.setInt(1, id);
			rs = pr.executeQuery();
		   	
			while(rs.next()){
				curso = new Curso();
				curso.setIdCurso(rs.getInt("idCurso"));
				curso.setNombre(rs.getString("nombre"));
				curso.setCodigo(rs.getString("codigo"));
			}
		 
		} catch (Exception e) {
			// TODO: handle exception
		}finally{
			cerrar(rs);
			cerrar(pr);
			cerrar(cn);	
		}
		
		return curso;
	}

	public List<Curso> listar() {
		// TODO Auto-generated method stub
		 List<Curso> listaCurso = null;
			try {
				String sQuery = "SELECT * FROM Curso";
				cn = obtenerConexion();
				pr = cn.prepareStatement(sQuery);
				rs = pr.executeQuery();
			   	listaCurso = new ArrayList<Curso>();
				
				while(rs.next()){
					Curso curso = new Curso();
					curso.setIdCurso(rs.getInt("idCurso"));
					curso.setNombre(rs.getString("nombre"));
					curso.setCodigo(rs.getString("codigo"));
				    listaCurso.add(curso);
				}
			 
			} catch (Exception e) {
				// TODO: handle exception
			}finally{
				cerrar(rs);
				cerrar(pr);
				cerrar(cn);	
			}
			
			return listaCurso;
	}
 
	public List<Curso> listarPorAlumno(Integer idAlumno){
		
		List<Curso> listaCurso = null;
		try {
			
		String sQuery = "SELECT c.* FROM Curso c INNER JOIN AlumnoXCurso axc ON axc.idAlumno = ? WHERE " +
				"c.idCurso = axc.idCurso";
		
		cn = obtenerConexion();
	    pr = cn.prepareStatement(sQuery);
	    pr.setInt(1, idAlumno);
	    rs = pr.executeQuery();
	    
	    listaCurso = new ArrayList<Curso>();
	    
	    while(rs.next()){
	    	Curso curso = new Curso();
			curso.setIdCurso(rs.getInt("idCurso"));
			curso.setNombre(rs.getString("nombre"));
			curso.setCodigo(rs.getString("codigo"));
		    listaCurso.add(curso);
	    }
			
		} catch (Exception e) {
			// TODO: handle exception
		}finally{
			cerrar(rs);
			cerrar(pr);
			cerrar(cn);
			
		}
		return listaCurso;
	}
}
