package com.edu.upc.ViewModel;

import java.util.List;



public class AlumnoViewModel {
	
	private Integer idAlumno;
	private String codigo;
	private String password;
	private Boolean bloqueado;
	private List<String> nombreCursos;
	
	public Integer getIdAlumno() {
		return idAlumno;
	}
	public void setIdAlumno(Integer idAlumno) {
		this.idAlumno = idAlumno;
	}
	public String getCodigo() {
		return codigo;
	}
	public void setCodigo(String codigo) {
		this.codigo = codigo;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	public Boolean getBloqueado() {
		return bloqueado;
	}
	public void setBloqueado(Boolean bloqueado) {
		this.bloqueado = bloqueado;
	}
	public List<String> getNombreCursos() {
		return nombreCursos;
	}
	public void setNombreCursos(List<String> nombreCursos) {
		this.nombreCursos = nombreCursos;
	}
	
	
	
}
