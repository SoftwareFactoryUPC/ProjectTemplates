package demohibernate;

import entidades.Autor;
import entidades.Libro;
import org.hibernate.Session;
import util.HibernateUtil;

public class DemoHibernate {

    public static void main(String[] args) {
        /*Primero creamos un autor y la asociamos con dos libros*/
        Libro libro1 = new Libro();
        libro1.setTitulo("20000 leguas de viaje submarino");
        libro1.setGenero("Novela");

        Libro libro2 = new Libro();
        libro2.setTitulo("La maquina del tiempo");
        libro2.setGenero("Novela");

        Autor autor1 = new Autor();
        autor1.setNombres("Nombre autor a eliminar");
        autor1.setApellidos("Apelido autor a elminar");
        autor1.setCiudadNac("Lima");
        autor1.setPaisNac("Peru");
        autor1.addLibro(libro1);
        autor1.addLibro(libro2);

        /*Creamos un segundo autor y lo asociamos con otros dos libros*/
        Libro libro3 = new Libro();
        libro3.setTitulo("El ingenioso hidalgo don Quijote de la Mancha");
        libro3.setGenero("Burlesque");

        Libro libro4 = new Libro();
        libro4.setTitulo("La Galatea");
        libro4.setGenero("Pastoral");

        Autor autor2 = new Autor();
        autor2.setNombres("Alex");
        autor2.setApellidos("Matias Soto");
        autor2.setCiudadNac("Paris");
        autor2.setPaisNac("Francia");
        autor2.addLibro(libro3);
        autor2.addLibro(libro4);

        /*En la primer sesion guardamos los dos autores (los libros
         correspondientes seran guardados en cascada*/
        Session sesion = HibernateUtil.getSessionFactory().openSession();
        sesion.beginTransaction();

        sesion.persist(autor1);
        sesion.persist(autor2);

        sesion.getTransaction().commit();
        sesion.close();

        /*En la segunda sesion eliminamos el autor1 (los dos primeros
         libros seran borrados en cascada)*/
        sesion = HibernateUtil.getSessionFactory().openSession();
        sesion.beginTransaction();

        sesion.delete(autor1);

        sesion.getTransaction().commit();
        sesion.close();
    }
}
