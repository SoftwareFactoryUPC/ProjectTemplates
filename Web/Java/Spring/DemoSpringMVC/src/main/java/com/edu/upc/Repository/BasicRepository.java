package com.edu.upc.Repository;

import java.util.List;

public interface BasicRepository<Entity,ID> {
    
	void Insertar(Entity e);
	void Actualizar(Entity e);
	void Eliminar(ID id);
	Entity ObtenerPorId(ID id);
	List<Entity> listar();
	
}
