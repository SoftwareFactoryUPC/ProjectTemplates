package com.upc.entity;

import java.util.List;

public class Alumno {

	
	private Integer idAlumno;
	private String codigo;
	private String password;
	private Boolean bloqueado;
	private List<Curso> listaCursos;
	
	public Alumno(){
		
	}

	public Alumno(Integer idAlumno, String codigo, String password,
			Boolean bloqueado, List<Curso> listaCursos) {
		this.idAlumno = idAlumno;
		this.codigo = codigo;
		this.password = password;
		this.bloqueado = bloqueado;
		this.listaCursos = listaCursos;
	}
	
	public Boolean getBloqueado() {
		return bloqueado;
	}

	public String getCodigo() {
		return codigo;
	}

	public Integer getIdAlumno() {
		return idAlumno;
	}

	public List<Curso> getListaCursos() {
		return listaCursos;
	}

	public String getPassword() {
		return password;
	}

	public void setBloqueado(Boolean bloqueado) {
		this.bloqueado = bloqueado;
	}

	public void setCodigo(String codigo) {
		this.codigo = codigo;
	}

	public void setIdAlumno(Integer idAlumno) {
		this.idAlumno = idAlumno;
	}

	public void setListaCursos(List<Curso> listaCursos) {
		this.listaCursos = listaCursos;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	
}
