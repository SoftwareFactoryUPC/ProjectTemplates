/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.upc.proyectos.hibernatesqlserver.helper;

import com.upc.proyectos.hibernatesqlserver.entidades.Products;
import com.upc.proyectos.hibernatesqlserver.util.HibernateUtil;
import java.util.List;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.Transaction;

/**
 *
 * @author Roy
 */
public class ProductHelper {

    private Session sesion;
    private Transaction tx;

    public ProductHelper() {
    }

    private void iniciaOperacion() throws HibernateException {
        sesion = HibernateUtil.getSessionFactory().openSession();
        tx = sesion.beginTransaction();
    }

    private void manejaExcepcion(HibernateException he) throws HibernateException {
        tx.rollback();
        throw new HibernateException("Ocurrió un error en la capa de acceso a datos", he);
    }

    public Products getProductByID(int productId) {
        Products product = null;
        try {
            iniciaOperacion();
            product = (Products) sesion.get(Products.class, productId);
        } finally {
            sesion.close();
        }
        return product;
    }

    public List getProducts() {
        List<Products> productList = null;
        try {
            iniciaOperacion();
            productList = sesion.createQuery("from Products").list();
        } finally {
            sesion.close();
        }
        return productList;
    }

    public Products saveProduct(Products product) throws HibernateException {
        int id = 0;
        try {
            iniciaOperacion();
            id = (int) sesion.save(product);
            tx.commit();
            product.setProductId(id);
        } catch (HibernateException he) {
            manejaExcepcion(he);
            throw he;
        } finally {
            sesion.close();
        }
        return product;
    }

    public Products updateProduct(Products product) throws HibernateException {
        try {
            iniciaOperacion();
            sesion.update(product);
            tx.commit();
        } catch (HibernateException he) {
            manejaExcepcion(he);
            throw he;
        } finally {
            sesion.close();
        }
        return product;
    }
    
    public void deleteProduct(Products product) throws HibernateException {
        try {
            iniciaOperacion();
            sesion.delete(product);
            tx.commit();
        } catch (HibernateException he) {
            manejaExcepcion(he);
            throw he;
        } finally {
            sesion.close();
        }
    }
}
