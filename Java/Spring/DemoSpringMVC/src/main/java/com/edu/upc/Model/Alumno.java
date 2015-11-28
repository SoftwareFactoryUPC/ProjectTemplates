package com.edu.upc.Model;

import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.Table;
import javax.persistence.Transient;


@Entity
@Table(name="Alumno")
public class Alumno {

	@Id
	@Column(name = "idAlumno")
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer idAlumno;
	private String codigo;
	private String password;
	@Column(nullable = true, columnDefinition = "BIT")
	private Boolean bloqueado;
	@ManyToMany
	@JoinTable(
				name="alumnoxcurso",
				joinColumns={@JoinColumn(name="idAlumno",referencedColumnName="idAlumno")},
				inverseJoinColumns={@JoinColumn(name="idCurso",referencedColumnName="idCurso")})
	private List<Curso> listaCursos;
	
	@Transient
	private Integer idCurso;
	
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
   
	public Integer getIdCurso() {
		return idCurso;
	}

	public void setIdCurso(Integer idCurso) {
		this.idCurso = idCurso;
	}
	
}
