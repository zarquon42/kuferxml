<?xml version="1.0" encoding="windows-1252"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="xml" indent="yes"/>
<xsl:template match="/kurse">
    <kurse>
        <xsl:for-each select="kurs">
            <kurs>
                <knr>
                    <xsl:value-of select="knr"/>
                </knr>
                <fachb>
                    <xsl:value-of select="fachb"/>
                </fachb>
                <fachbtext>
                    <xsl:value-of select="fachbtext"/>
                </fachbtext>
                <haupttitel>
                    <xsl:value-of select="haupttitel"/>
                </haupttitel>
                <inhalt>
                    <xsl:value-of select="inhalt"/>
                </inhalt>
                <mitarbeiter_planend>
                    <xsl:value-of select="mitarbeiter_planend"/>
                </mitarbeiter_planend>
                <ort>
                    <xsl:value-of select="ort"/>
                </ort>
                <ortaussenstelle>
                    <xsl:value-of select="ortaussenstelle"/>
                </ortaussenstelle>
                <ortraumname>
                    <xsl:value-of select="ortraumname"/>
                </ortraumname>
                <ortgebaeude>
                    <xsl:value-of select="ortgebaeude"/>
                </ortgebaeude>
                <ortstr>
                    <xsl:value-of select="ortstr"/>
                </ortstr>
                <ortplz>
                    <xsl:value-of select="ortplz"/>
                </ortplz>
                <ortname>
                    <xsl:value-of select="ortname"/>
                </ortname>
                <beginndat>
                    <xsl:value-of select="beginndat"/>
                </beginndat>
                <endedat>
                    <xsl:value-of select="endedat"/>
                </endedat>
                <beginnuhr>
                    <xsl:value-of select="beginnuhr"/>
                </beginnuhr>
                <endeuhr>
                    <xsl:value-of select="endeuhr"/>
                </endeuhr>
                <dauer>
                    <xsl:value-of select="dauer"/>
                </dauer>
                <termine>
                    <xsl:for-each select="termine/termin">
                        <termin>
                        <tag>
                            <xsl:value-of select="tag"/>
                        </tag>
                        <zeitvon>
                            <xsl:value-of select="zeitvon"/>
                        </zeitvon>
                        <zeitbis>
                            <xsl:value-of select="zeitbis"/>
                        </zeitbis>
                        </termin>
                    </xsl:for-each>
                </termine>
                <tnmax>
                    <xsl:value-of select="tnmax"/>
                </tnmax>
                <tnmin>
                    <xsl:value-of select="tnmin"/>
                </tnmin>
                <tnanmeldungen>
                    <xsl:value-of select="tnanmeldungen"/>
                </tnanmeldungen>
            </kurs>
        </xsl:for-each>
    </kurse>
</xsl:template>
</xsl:stylesheet>