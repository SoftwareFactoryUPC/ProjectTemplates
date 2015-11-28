using PagedList.Mvc;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Linq;
using System.Web;

namespace Plantilla.Proyecto.MVC.Helpers
{
    public class ConstantHelpers
    {
        public static String ESTADO_ACTIVO = "ACT";
        public static String ESTADO_INACTIVO = "INA";

        public const String ROL_ADMINISTRADOR = "ADM";
        public const String ROL_SUPERVISOR = "SUP";
        public const String ROL_ASESOR = "ASE";

        public const Int32 PAGE_SIZE = 10;

        public static PagedListRenderOptions TwitterBootstrapPagerAligned
        {
            get
            {
                return new PagedListRenderOptions()
                {
                    DisplayLinkToFirstPage = PagedListDisplayMode.Never,
                    DisplayLinkToLastPage = PagedListDisplayMode.Never,
                    DisplayLinkToPreviousPage = PagedListDisplayMode.Always,
                    DisplayLinkToNextPage = PagedListDisplayMode.Always,
                    DisplayLinkToIndividualPages = true,
                    ContainerDivClasses = null,
                    UlElementClasses = new[] { "pagination" },
                    ClassToApplyToFirstListItemInPager = "first",
                    ClassToApplyToLastListItemInPager = "last",
                    LinkToFirstPageFormat = "<i class='md md-more-horiz'><i>",
                    LinkToPreviousPageFormat = "<i class='md md-chevron-left'></i>",
                    LinkToIndividualPageFormat = "{0}",
                    LinkToNextPageFormat = "<i class='md md-chevron-right'></i>",
                    LinkToLastPageFormat = "<i class='md md-more-horiz'><i>"
                };
            }
        }
    }


}