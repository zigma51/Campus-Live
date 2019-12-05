<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">

<html> 
    <head>
        <style>
            h1{
            font-size: 70px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 18px;
            }
            table{
            width:100%;
            table-layout: fixed;
            }
            .tbl-header{
            background-color: rgba(255,255,255,0.3);
            }
            .tbl-content{
            height:300px;
            overflow-x:auto;
            margin-top: 0px;
            border: 1px solid rgba(255,255,255,0.3);
            }
            th{
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 26px;
            color: #fff;
            text-transform: uppercase;
            }
            td{
            padding: 15px;
            text-align: left;
            vertical-align:middle;
            font-weight: 300;
            font-size: 22px;
            color: #fff;
            border-bottom: solid 1px rgba(255,255,255,0.1);
            }


            /* demo styles */

            @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
            body{
            background: -webkit-linear-gradient(left, #25c481, #25b7c4);
            background: linear-gradient(to right, #25c481, #25b7c4);
            font-family: 'Roboto', sans-serif;
            }
            section{
            margin: 50px;
            }


            /* for custom scrollbar for webkit browser*/

            ::-webkit-scrollbar {
                width: 6px;
            } 
            ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            } 
            ::-webkit-scrollbar-thumb {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            }
        </style>
    </head>
    <body>
        
        <section>
  <!--for demo wrap-->
            <h1>Events</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Events</th>
                            <th>Organizer</th>
                            <th>Students Participated</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <xsl:for-each select="catalog/cd">
                            <tr>
                                <td><xsl:value-of select="Event"/></td>
                                <td><xsl:value-of select="org"/></td>
                                <td><xsl:value-of select="stud"/></td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </div>
        </section>
    </body>
</html>

<script>
    // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
    $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
</script>
</xsl:template>
</xsl:stylesheet>
