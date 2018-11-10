#!/usr/bin/env python
print("Content-Type: text/html")
print()
import cgi

import mysql.connector
import sys
import plotly.plotly as py
import plotly.tools as tools
import plotly.graph_objs as go
import pandas as pd
from plotly.offline import download_plotlyjs, init_notebook_mode, plot, iplot

conn = mysql.connector.connect(host="localhost", user="root", passwd="", db="autismdb")
cursor = conn.cursor()
cursor.execute('select age, gender, ethnicity, contry_of_res, result, class from autismdata');

rows = cursor.fetchall()

df = pd.DataFrame( [[ij for ij in i] for i in rows] )
df.rename(columns={0: 'Age', 1: 'Gender', 2: 'Ethnicity', 3: 'Country', 4:'Result', 5:'Class'}, inplace=True);
df = df.sort_values(['Age'], ascending=[1]);

trace1 = go.Bar(
    x=list(df.groupby(['Age']).groups.keys()),
    y=df[df['Class'] == 'YES'].groupby('Age')['Result'].count(),
    name='Yes Autism',
    marker = dict(
        color = 'rgba(246, 78, 139, 0.6)',
        line = dict(
            color = 'rgba(246, 78, 139, 1.0)',
            width = 3)
    )
)
trace2 = go.Bar(
    x=list(df.groupby(['Age']).groups.keys()),
    y=df[df['Class'] == 'NO'].groupby('Age')['Result'].count(),
    name='No Autism',
    marker = dict(
        color = 'rgba(58, 71, 80, 0.6)',
        line = dict(
            color = 'rgba(58, 71, 80, 1.0)',
            width = 3)
    )
)

trace3 = go.Bar(
    y=list(df.groupby(['Gender']).groups.keys()),
    x=df[df['Class'] == 'YES'].groupby('Gender')['Result'].count(),
    name='Yes Autism',
    orientation = 'h',
    marker = dict(
        color = 'rgba(246, 78, 139, 0.6)',
        line = dict(
            color = 'rgba(246, 78, 139, 1.0)',
            width = 3)
    )
)
trace4 = go.Bar(
    y=list(df.groupby(['Gender']).groups.keys()),
    x=df[df['Class'] == 'NO'].groupby('Gender')['Result'].count(),
    name='No Autism',
    orientation = 'h',
    marker = dict(
        color = 'rgba(58, 71, 80, 0.6)',
        line = dict(
            color = 'rgba(58, 71, 80, 1.0)',
            width = 3)
    )
)

trace5 = {"x": df[df['Class'] == 'YES'].groupby('Ethnicity')['Result'].count(), 
          "y": list(df.groupby(['Ethnicity']).groups.keys()), 
          "marker": {"color": "rgba(246, 78, 139, 0.6)", "size": 12}, 
          "mode": "markers", 
          "name": "Yes Autism", 
          "type": "scatter"
}

trace6 = {"x": df[df['Class'] == 'NO'].groupby('Ethnicity')['Result'].count(), 
          "y": list(df.groupby(['Ethnicity']).groups.keys()), 
          "marker": {"color": "gray", "size": 12}, 
          "mode": "markers", 
          "name": "No Autism", 
          "type": "scatter"
}

size = list(df.groupby(['Result']).groups.keys())
trace7 = go.Scatter(
    x=list(df.groupby(['Country']).groups.keys()),
    y=df[df['Class'] == 'YES'].groupby('Country')['Result'].count(),
    mode='markers',
    name='Yes Autism',
    marker=dict(
        size=size,
        sizemode='area',
        sizeref=2.*max(size)/(50.**2),
        sizemin=4
    )
)

trace8 = go.Scatter(
    x=list(df.groupby(['Country']).groups.keys()),
    y=df[df['Class'] == 'NO'].groupby('Country')['Result'].count(),
    mode='markers',
    name='No Autism',
    marker=dict(
        size=size,
        sizemode='area',
        sizeref=2.*max(size)/(50.**2),
        sizemin=4
    )
)


fig = tools.make_subplots(rows=2, cols=2, subplot_titles=('Age Group vs Count', 'Gender vs Count', 'Ethnicity vs Count', 'Country vs Count'))

fig.append_trace(trace1, 1, 1)
fig.append_trace(trace2, 1, 1)
fig.append_trace(trace3, 1, 2)
fig.append_trace(trace4, 1, 2)
fig.append_trace(trace5, 2, 1)
fig.append_trace(trace6, 2, 1)
fig.append_trace(trace7, 2, 2)
fig.append_trace(trace8, 2, 2)

fig['layout'].update(title='Multiple Subplots')
plot(fig, filename='demopyplot1.html')
conn.close()
