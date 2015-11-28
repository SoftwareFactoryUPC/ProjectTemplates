package com.edu.upc.Model;

import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToMany;
import javax.persistence.Table;

@Entity
@Table(name="Curso")
public class Curso {

	@Id
	@Column(name = "idCurso")
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer idCurso;
	private String codigo;
	private String nombre;
	
	@ManyToMany(mappedBy="listaCursos")
	private List<Alumno> listaAlumnos;
	
	@ManyToMany(mappedBy="listaCursos")
	private List<Carrera> listaCarrera;
	
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
