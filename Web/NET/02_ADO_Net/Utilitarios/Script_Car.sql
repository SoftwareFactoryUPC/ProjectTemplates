USE [Software_Factory]
GO

/****** Object:  Table [dbo].[Car]    Script Date: 01/05/2016 07:01:33 p.m. ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[Car](
	[car_id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](15) NULL,
	[company] [varchar](15) NULL,
	[stock] [int] NULL
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO


