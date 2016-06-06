/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.upc.proyectos.hibernatesqlserver;

import com.upc.proyectos.hibernatesqlserver.entidades.Products;
import com.upc.proyectos.hibernatesqlserver.helper.ProductHelper;
import java.util.List;

/**
 *
 * @author Roy
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ProductHelper productHelper = new ProductHelper();

        //Listar todos los productos
        List<Products> listProducts = productHelper.getProducts();
        System.out.println("=====LISTAR=====");
        for (Products products : listProducts) {
            System.out.println(products.getProductId() + "=>" + products.getProductName());
        }

        //Obtener un producto por id
        System.out.println("====OBTENER=====");
        Products product = productHelper.getProductByID(3);
        System.out.println(product.getProductId() + "=>" + product.getProductName());

        //Insertar un producto
        System.out.println("=====INSERTAR=====");
        product = new Products();
        product.setProductName("Nuevo Producto");
        product.setDiscontinued(false);
        product = productHelper.saveProduct(product);
        System.out.println(product.getProductId() + "=>" + product.getProductName());

        //Actualizar un producto
        System.out.println("=====ACTUALIZAR=====");
        product.setProductName("Nombre Actualizado Producto");
        product = productHelper.updateProduct(product);
        System.out.println(product.getProductId() + "=>" + product.getProductName());
        
        //Listar todos los productos nuevamente
        System.out.println("=====LISTAR NUEVAMENTE=====");
        listProducts = productHelper.getProducts();
        for (Products products : listProducts) {
            System.out.println(products.getProductId() + "=>" + products.getProductName());
        }

        //Eliminar un producto
        System.out.println("=====ELIMINAR=====");
        productHelper.deleteProduct(product);

        //Listar todos los productos nuevamente
        System.out.println("=====LISTAR NUEVAMENTE=====");
        listProducts = productHelper.getProducts();
        for (Products products : listProducts) {
            System.out.println(products.getProductId() + "=>" + products.getProductName());
        }
    }
}
