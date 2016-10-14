package com.upc.proyectos.musicstoredb.util.helper;

import com.upc.proyectos.musicstoredb.entidades.Disco;
import com.upc.proyectos.musicstoredb.util.HibernateUtil;
import java.util.List;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.Transaction;

public class DiscoHelper {

    public DiscoHelper() {

    }

    private Session sesion;
    private Transaction tx;

    public Disco guardaDisco(Disco Disco) throws HibernateException {
        long id = 0;

        try {
            iniciaOperacion();
            id = (Long) sesion.save(Disco);
            tx.commit();
            Disco.setId(id);
        } catch (HibernateException he) {
            manejaExcepcion(he);
            throw he;
        } finally {
            sesion.close();
        }

        return Disco;
    }

    public Disco actualizaDisco(Disco Disco) throws HibernateException {
        try {
            iniciaOperacion();
            sesion.update(Disco);
            tx.commit();
        } catch (HibernateException he) {
            manejaExcepcion(he);
            throw he;
        } finally {
            sesion.close();
        }
        return Disco;
    }

    public void eliminaDisco(Disco Disco) throws HibernateException {
        try {
            iniciaOperacion();
            sesion.delete(Disco);
            tx.commit();
        } catch (HibernateException he) {
            manejaExcepcion(he);
            throw he;
        } finally {
            sesion.close();
        }
    }

    public Disco obtenDisco(long idDisco) throws HibernateException {
        Disco Disco = null;
        try {
            iniciaOperacion();
            Disco = (Disco) sesion.get(Disco.class, idDisco);
        } finally {
            sesion.close();
        }

        return Disco;
    }

    public List<Disco> obtenListaDiscos() throws HibernateException {
        List<Disco> listaDiscos = null;

        try {
            iniciaOperacion();
            listaDiscos = sesion.createQuery("from Disco").list();
        } finally {
            sesion.close();
        }

        return listaDiscos;
    }

    private void iniciaOperacion() throws HibernateException {
        sesion = HibernateUtil.getSessionFactory().openSession();
        tx = sesion.beginTransaction();
    }

    private void manejaExcepcion(HibernateException he) throws HibernateException {
        tx.rollback();
        throw new HibernateException("Ocurrió un error en la capa de acceso a datos", he);
    }
}
