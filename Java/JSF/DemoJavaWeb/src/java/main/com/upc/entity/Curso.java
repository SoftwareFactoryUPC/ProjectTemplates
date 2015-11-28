package com.upc.entity;

import java.util.List;

public class Curso {

	private Integer idCurso;
	private String codigo;
	private String nombre;
	private List<Alumno> listaAlumnos;
	
	public Curso(){
		
		
	}

	public Curso(Integer idCurso, String codigo, String nombre,
			List<Alumno> listaAlumnos) {
		super();
		this.idCurso = idCurso;
		this.codigo = codigo;
		this.nombre = nombre;
		this.listaAlumnos = listaAlumnos;
	}



	public String getCodigo() {
		return codigo;
	}

	public Integer getIdCurso() {
		return idCurso;
	}

	public List<Alumno> getListaAlumnos() {
		return listaAlumnos;
	}

	public String getNombre() {
		return nombre;
	}

	public void setCodigo(String codigo) {
		this.codigo = codigo;
	}

	public void setIdCurso(Integer idCurso) {
		this.idCurso = idCurso;
	}

	public void setListaAlumnos(List<Alumno> listaAlumnos) {
		this.listaAlumnos = listaAlumnos;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}
	

}
