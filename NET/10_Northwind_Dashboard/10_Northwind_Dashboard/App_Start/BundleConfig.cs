using System.Web;
using System.Web.Optimization;

namespace _10_Northwind_Dashboard
{
    public class BundleConfig
    {
        // Para obtener más información sobre las uniones, visite http://go.microsoft.com/fwlink/?LinkId=301862
        public static void RegisterBundles(BundleCollection bundles)
        {
            bundles.Add(new ScriptBundle("~/bundles/jquery").Include(
                        "~/Scripts/jquery-{version}.js"));

            bundles.Add(new ScriptBundle("~/bundles/jqueryval").Include(
                        "~/Scripts/jquery.validate*"));

            // Utilice la versión de desarrollo de Modernizr para desarrollar y obtener información. De este modo, estará
            // preparado para la producción y podrá utilizar la herramienta de compilación disponible en http://modernizr.com para seleccionar solo las pruebas que necesite.
            bundles.Add(new ScriptBundle("~/bundles/modernizr").Include(
                        "~/Scripts/modernizr-*"));

            bundles.Add(new ScriptBundle("~/bundles/bootstrap").Include(
                      "~/Scripts/bootstrap.js",
                      "~/Scripts/respond.js"));

            bundles.Add(new StyleBundle("~/Content/css").Include(
                      "~/Content/bootstrap.css",
                      "~/Content/site.css"));
            //--------------------------------------------------------------
            //JQWidgets
            bundles.Add(new ScriptBundle("~/bundles/jqwidgets").Include(
            "~/Scripts/jqxcore.js",
            "~/Scripts/jqxdata.js",
            "~/Scripts/jqxgrid.js",
            "~/Scripts/jqxgrid.selection.js",
            "~/Scripts/jqxgrid.pager.js",
            "~/Scripts/jqxlistbox.js",
            "~/Scripts/jqxbuttons.js",
            "~/Scripts/jqxscrollbar.js",
            "~/Scripts/jqxdatatable.js",
            "~/Scripts/jqxtreegrid.js",
            "~/Scripts/jqxmenu.js",
            "~/Scripts/jqxcalendar.js",
            "~/Scripts/jqxgrid.sort.js",
            "~/Scripts/jqxgrid.filter.js",
            "~/Scripts/jqxdatetimeinput.js",
            "~/Scripts/jqxdropdownlist.js",
            "~/Scripts/jqxslider.js",
            "~/Scripts/jqxeditor.js",
            "~/Scripts/jqxinput.js",
            "~/Scripts/jqxdraw.js",
            "~/Scripts/jqxchart.core.js",
            "~/Scripts/jqxchart.rangeselector.js",
            "~/Scripts/jqxtree.js",
            "~/Scripts/globalize.js",
            "~/Scripts/jqxbulletchart.js",
            "~/Scripts/jqxcheckbox.js",
            "~/Scripts/jqxradiobutton.js",
            "~/Scripts/jqxvalidator.js",
            "~/Scripts/jqxpanel.js",
            "~/Scripts/jqxpasswordinput.js",
            "~/Scripts/jqxnumberinput.js",
            "~/Scripts/jqxcombobox.js",
            "~/Scripts/jqxdata.export.js",
            "~/Scripts/jqxgrid.export.js"
            ));
            bundles.Add(new StyleBundle("~/bundles/jqwidgets_css").Include(
                "~/Content/jqx.base.css",
                "~/Content/jqx.arctic.css",
                "~/Content/jqx.black.css",
                "~/Content/jqx.bootstrap.css",
                "~/Content/jqx.classic.css",
                "~/Content/jqx.darkblue.css",
                "~/Content/jqx.energyblue.css",
                "~/Content/jqx.fresh.css",
                "~/Content/jqx.highcontrast.css",
                "~/Content/jqx.metro.css",
                "~/Content/jqx.metrodark.css",
                "~/Content/jqx.office.css",
                "~/Content/jqx.orange.css",
                "~/Content/jqx.shinyblack.css",
                "~/Content/jqx.summer.css",
                "~/Content/jqx.web.css",
                "~/Content/jqx.ui-darkness.css",
                "~/Content/jqx.ui-lightness.css",
                "~/Content/jqx.ui-le-frog.css",
                "~/Content/jqx.ui-overcast.css",
                "~/Content/jqx.ui-redmond.css",
                "~/Content/jqx.ui-smoothness.css",
                "~/Content/jqx.ui-start.css",
                "~/Content/jqx.ui-sunny.css",
                "~/Content/bootstrap.css",
                "~/Content/site.css"
                ));
        }
    }
}
