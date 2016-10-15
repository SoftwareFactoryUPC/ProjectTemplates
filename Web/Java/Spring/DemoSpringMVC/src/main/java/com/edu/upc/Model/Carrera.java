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
import javax.validation.constraints.Pattern;
import javax.validation.constraints.Size;

import org.hibernate.validator.constraints.NotEmpty;
@Entity
@Table(name="Carrera")
public class Carrera {
     
	@Id
	@Column(name = "idCarrera")
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer idCarrera;
	@NotEmpty
	@Size(min=3,max=5)
	@Pattern(regexp="[a-zA-Z]{2}[0-9]{3}")
	private String codigo;
	@NotEmpty
	private String nombre;

	@ManyToMany
	@JoinTable(
				name="carreraxcurso",
				joinColumns={@JoinColumn(name="idCarrera",referencedColumnName="idCarrera")},
				inverseJoinColumns={@JoinColumn(name="idCurso",referencedColumnName="idCurso")})
	private List<Curso> listaCursos;
	
	public Carrera(){
		
	}

	public Carrera(Integer idCarrera, String codigo, String nombre) {
		this.idCarrera = idCarrera;
		this.codigo = codigo;
		this.nombre = nombre;
	}

	public Integer getIdCarrera() {
		return idCarrera;
	}

	public void setIdCarrera(Integer idCarrera) {
		this.idCarrera = idCarrera;
	}

	public String getCodigo() {
		return codigo;
	}

	public void setCodigo(String codigo) {
		this.codigo = codigo;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}
	
}
