package com.upc.dao;

import java.util.List;

public interface BaseDao<Entity,ID>{
 
	void insertar(Entity e);
	void actualizar(Entity e);
	void eliminar(ID id);
	Entity obtener (ID id);
	List<Entity> listar();
	 
}
